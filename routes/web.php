<?php

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

Route::group(['prefix' => 'setup', 'as' => 'setup.', 'middleware' => 'setup'], function() {
	Route::get('/', 'SetupController@index')->name('index');
	Route::get('database', 'SetupController@database')->name('database');
	Route::post('/', 'SetupController@blog')->name('blog');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'ready'], function() {
	// Authentication routes
	Route::group(['as' => 'auth.', 'namespace' => 'Auth'], function() {
		Route::get('login', 'LoginController@showLoginForm')->name('login');
	    Route::post('login', 'LoginController@login');
	    Route::post('logout', 'LoginController@logout')->name('logout');

	    // Reset forgotten password routes
	    Route::get('password/email', 'ForgotPasswordController@showLinkRequestForm')->name('forgot');
	    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
	    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('reset');
	    Route::post('password/reset/{token}', 'ResetPasswordController@reset');
	});

    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function() {
    	Route::get('/', ['as' => 'index', 'uses' => 'MainController@index']);

    	Route::group(['prefix' => 'post', 'as' => 'post.'], function() {
    		Route::get('add', 'PostController@add')->name('add');
    		Route::post('add', 'PostController@store');
    	});
    });
});