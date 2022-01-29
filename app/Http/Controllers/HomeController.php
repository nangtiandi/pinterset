<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::when(isset(request()->search),function ($query){
           $query->where('title','like','%'.request()->search.'%');
        })->latest('id')->get();
        return view('welcome',compact('posts'));
    }
    public function CatPostView(){
//        $category = Category::where('id')->get();
        $posts = Post::where('category_id',Category::where('id'));
        return view('cat-post-view',compact('posts'));
    }
    public function home()
    {
        return view('home');
    }
    public function post(Post $post){
//        $posts = Post::latest('id')->get();
        return view('user-post',compact('post'));
    }
    public function userPost($id){
        $post = Post::findOrFail($id);
        return view('user-post',compact('post'));
    }
    public function userProfile(){
        return view('user.profile');
    }

    public function updatePhoto(Request $request){
        $request->validate([
            'photo' => 'required|file|mimes:png,jpeg,jpg,max:1000',
        ]);

        $newName = uniqid()."_profile.".$request->file('photo')->extension();
        $request->file('photo')->storeAs("public/profile",$newName);

        $currentUser = User::find(Auth::id());
        $currentUser->avatar = $newName;
        $currentUser->update();

        return redirect()->back()->with('success','Updated Your Profile Photo');
    }
    public function updateProfile(Request $request){
        $request->validate([
            'phone' => 'required',
            'bio' => 'required|max:225',
        ]);


        $currentUser = User::find(Auth::id());
        $currentUser->phone = $request->phone;
        $currentUser->bio = $request->bio;
        $currentUser->update();

        return redirect()->back()->with('success','Thanks For Your filling!');
    }
    public function postOwner(){
        $posts = Post::when(isset(request()->search),function ($query){
            $query->where('title','like','%'.request()->search.'%');
        })->where('user_id',Auth::id())->get();
//        $posts = Post::where('user_id',Auth::id())->get();
        return view('user.post-owner',compact('posts'));
    }
    public function postCreate()
    {
        return view('user.post-create');
    }
    public function postUpload(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'photo' => 'required|file|mimes:png,jpg,jpeg|max:1000',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        $post = new Post();
        $post->title = ucfirst($request->title);
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description,10);
        $post->user_id = Auth::id();
        ##photo
        $requestPhoto = $request->file('photo');
        $newName = uniqid()."_post.".$requestPhoto->extension();
        $requestPhoto->storeAs('public/product',$newName);
        $post->photo = $newName;
        $post->save();
        return redirect()->route('post.owner')->with('success','Your Uploading is success.');

    }
}
