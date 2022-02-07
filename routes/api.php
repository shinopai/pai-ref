<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// get current user name
Route::get('/user', function (Request $request) {
    return Auth::user()->name;
});

// get number of like each photo
Route::get('photos/{photo}/likes', 'Api\LikesController@getAllLikes');

// like photo
Route::post('users/{user}/photos/{photo}/like_photo', 'Api\LikesController@likePhoto');

// unlike photo
Route::post('users/{user}/photos/{photo}/unlike_photo', 'Api\LikesController@unlikePhoto');

// check if user likes this photo
Route::get('users/{user}/photos/{photo}/check_is_liked', 'Api\LikesController@checkIsLiked');
