<?php
// root
Route::get('/', 'TopController@index')->name('top.index');

// auth user
Auth::routes();
