<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Photo;
use App\Category;
use App\Location;
use App\Comment;
use App\Like;

class UsersController extends Controller
{
    public function showProfile(User $user){
        return view('users.profile')->with('user', $user);
    }

    public function showAll(User $user){
        $photos = Photo::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(100);

        return view('users.portfolio')->with([
            'photos' => $photos,
            'user' => $user
        ]);
    }

    public function showDetail(User $user, Photo $photo){
        $user->load('photos');
        $photo->load('category');
        $comments = Comment::where('photo_id', $photo->id)->orderBy('created_at', 'desc')->get();
        $comments->load('user');

        return view('users.photo_detail')->with([
            'photo' => $photo,
            'user' => $user,
            'comments' => $comments
        ]);
    }

    public function showAllPhotosLikes(User $user){
        $liked_photo_ids = Like::where('user_id', $user->id)->pluck('photo_id');
        $photos = Photo::whereIn('id', $liked_photo_ids)->orderBy('created_at', 'desc')->paginate(100);

        return view('users.liked_photos')->with([
            'photos' => $photos,
            'user' => $user
        ]);
    }
}
