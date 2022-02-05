<?php
// root
Route::get('/', 'TopController@index')->name('top.index');

// auth user
Auth::routes();

// photos(create, edit, update, destroy)
Route::resource('users.photos', 'PhotosController');

// photos search page
Route::get('/search', 'PhotosController@showSearch')->name('photos.showSearch');

// all photos page
Route::get('/all_photos', 'PhotosController@showAll')->name('photos.showAll');

// search result page
Route::get('/search_result', 'PhotosController@getSearchResult')->name('photos.getSearchResult');

// get photos each category
Route::get('/search/category/{category}', 'PhotosController@getPhotosEachCategory')->name('photos.getPhotosEachCategory');
