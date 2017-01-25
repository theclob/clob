<?php

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| Here is where you can register public routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "public" middleware group. Now create something great!
|
*/

// Public blog routes
Route::group(['as' => 'blog.'], function() {
	Route::get('/', 'BlogController@index')->name('index');
    Route::get('feed', 'BlogController@feed')->name('feed');
	Route::get('{post}', 'BlogController@show')->name('show');
});