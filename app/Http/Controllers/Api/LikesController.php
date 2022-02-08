<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Like;
use App\Photo;
use App\User;

class LikesController extends Controller
{
    public function getAllLikes(Photo $photo){
        $likes = Like::where('photo_id', $photo->id)->get();

        return $likes;
    }

    public function likePhoto(User $user, Photo $photo){
        $user_id = User::where('name', $user->name)->value('id');

        Like::create([
            'user_id' => $user_id,
            'photo_id' => $photo->id
        ]);
    }

    public function unlikePhoto(User $user, Photo $photo){
        $user_id = User::where('name', $user->name)->value('id');

        $like = Like::where('user_id', $user_id)->where('photo_id', $photo->id)->first();
        $like->delete();
    }

    public function checkIsLiked(User $user, Photo $photo){
        $user_id = User::where('name', $user->name)->value('id');

        $like = Like::where('user_id', $user_id)->where('photo_id', $photo->id)->get();

        return $like;
    }
}
