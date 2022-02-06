<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Photo;

class CommentsController extends Controller
{
    public function store(Request $request, User $user, Photo $photo){
        $this->validate($request, [
            'body' => 'required|max:500'
        ]);

        $user->comments()->create([
            'body' => $request->body,
            'photo_id' => $photo->id
        ]);

        return redirect()->back()->with('flash', 'コメントを投稿しました');
    }

    public function destroy(User $user, Photo $photo, Comment $comment){
        $comment->delete();

        return redirect()->back()->with('flash', 'コメントを削除しました');
    }
}
