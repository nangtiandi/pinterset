<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::middleware('auth')->group(function (){
    #comment route
    Route::post('/comments/add',[\App\Http\Controllers\CommentController::class,'create'])->name('comment.create');
    Route::get('/comments/delete/{id}',[\App\Http\Controllers\CommentController::class,'delete'])->name('comment.delete');
    #user post and profile
    Route::get('/user-post',[\App\Http\Controllers\HomeController::class,'post'])->name('post');
    Route::get('/user-post/{id}',[\App\Http\Controllers\HomeController::class,'userPost'])->name('user.post');
    Route::get('/user-profile',[\App\Http\Controllers\HomeController::class,'userProfile'])->name('user.profile');
    Route::post('/user-profile',[\App\Http\Controllers\HomeController::class,'updateProfile'])->name('user.profile');
    Route::post('/user-photo',[\App\Http\Controllers\HomeController::class,'updatePhoto'])->name('user.photo');
    Route::get('/post-owner',[\App\Http\Controllers\HomeController::class,'postOwner'])->name('post.owner');
    Route::get('/post-upload',[\App\Http\Controllers\HomeController::class,'postCreate'])->name('post.upload');
    Route::post('/post-upload',[\App\Http\Controllers\HomeController::class,'postUpload'])->name('post.upload');

    #admin user
    Route::middleware('isAdmin')->group(function (){
        Route::resource('post',\App\Http\Controllers\PostController::class);
        Route::resource('category',\App\Http\Controllers\CategoryController::class);
        #user
        Route::get('/user/edit/{id}',[ProfileController::class,'edit'])->name('user.edit');
        Route::post('/user/update/{id}',[ProfileController::class,'update'])->name('user.update');
        Route::put('/user/delete/{id}',[ProfileController::class,'destroy'])->name('user.destroy');
        Route::get('/user',[ProfileController::class,'index'])->name('user.index');
        #admin panel
        Route::prefix("profile")->name("profile.")->group(function(){
            #profile
            Route::view("/","profile.index")->name('index');
            Route::get('/change-profile',[ProfileController::class,'updateProfileView'])->name('update-profile');
            Route::post('/change-profile',[ProfileController::class,'updateProfile'])->name('update-profile');
            Route::get("/change-password",[ProfileController::class,'changePassword'])->name('change-password');
            Route::post("/change-password",[ProfileController::class,'updatePassword'])->name('change-password');
        });
    });
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/post-view/{id}', [App\Http\Controllers\HomeController::class, 'CatPostView'])->name('cat.post');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home')->middleware('isAdmin');
Route::get('services',function (){
    return view('services');
})->name('terms');
Route::get('policy',function (){
    return view('policy');
})->name('policy');
#socialite packages
Route::get('/login/google',[LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback',[LoginController::class,'handleGoogleCallback']);

Route::get('/login/facebook',[LoginController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback',[LoginController::class,'handleFacebookCallback']);
