<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function create(Request $request){
        $request->validate([
           'comment' => 'required'
        ]);
        $comment = new Comment();
        $comment->comment = request()->comment;
        $comment->post_id = request()->post_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return back();
    }
    public function delete($id){
        $comment = Comment::findOrFail($id);
        if (Gate::allows('comment_delete',$comment)){
            $comment->delete();
            return back();
        }else{
            return back()->with('error',"You can't delete other users comments.");
        }
//        if ($comment->user_id == auth()->user()->id){
//            $comment->delete();
//            return back();
//        }else{
//            return back()->with('error','Unauthorize');
//        }
    }
}
