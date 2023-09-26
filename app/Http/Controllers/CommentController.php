<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index($id){
        $comments = Comment::where('room_id',$id)->get(); 
        return response()->json($comments);
    }

    public function store(Request $request , $id){
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->room_id = $id;
        $comment->comment = $request->comment;

        if($comment->save()){
            return redirect()->back();
        }    }
}
