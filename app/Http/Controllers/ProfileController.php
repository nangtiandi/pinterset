<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function changePassword(){
        return view('profile.change-password');
    }
    public function updatePassword(Request $request){
        $user = Auth::user();
        $userPassword = $user->password;
        $request->validate([
           'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required'
        ]);
        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password' => 'password not match']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('toast',Custom::sweetAlert('success','Successfully Updated You Password'));
    }
    public function updateProfileView(){
        return view('profile.index');
    }
    public function updateProfile(Request $request){
        $request->validate([
           'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'bio' => 'required|max:225',
            'photo' => 'required|file|mimes:png,jpeg,jpg,max:1000',
        ]);

        $newName = uniqid()."_profile.".$request->file('photo')->extension();
        $request->file('photo')->storeAs("public/profile",$newName);

        $currentUser = User::find(Auth::id());
        $currentUser->name = $request->name;
        $currentUser->email = $request->email;
        $currentUser->phone = $request->phone;
        $currentUser->bio = $request->bio;
        $currentUser->avatar = $newName;
        $currentUser->update();

        return redirect()->back()->with('toast',Custom::sweetAlert('success','Successfully Updated Your Profile'));
    }
    public function index(){
        $users = User::latest('id')->paginate(15);
        return view('user.index',compact('users'));
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));
    }
    public function update(Request $request,$id){
        $user = User::findOrFail($id);
        $request->validate([
           'role' => 'required|min:0|max:1'
        ]);
        $user->role = $request->role;
        $user->update();
        return redirect()->route('user.index');
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('toast',Custom::sweetAlert('success','Successfully Deleted User'));
    }
}
