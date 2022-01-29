<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest('id')->paginate('15');
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = ucfirst($request->title);
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description,10);
        $post->user_id = Auth::user()->id;
        ##photo
        $requestPhoto = $request->file('photo');
        $newName = uniqid()."_post.".$requestPhoto->extension();
        $requestPhoto->storeAs('public/product',$newName);
        $post->photo = $newName;
        $post->save();
        return redirect()->route('post.index')->with('toast',Custom::sweetAlert('success','Successfully Created Post'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = ucfirst($request->title);
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description,10);
        $post->user_id = Auth::user()->id;
        ##photo
        $requestPhoto = $request->file('photo');
        $newName = uniqid()."_post.".$requestPhoto->extension();
        $requestPhoto->storeAs('public/product',$newName);
        $post->photo = $newName;
        $post->update();
        return redirect()->route('post.index')->with('toast',Custom::sweetAlert('success','Successfully Updated Post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('toast',Custom::sweetAlert('success','Successfully Deleted Post'));
    }
}
