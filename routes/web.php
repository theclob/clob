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

// Setup Routes
Route::group(['prefix' => 'setup', 'as' => 'setup.', 'middleware' => 'setup'], function() {
	Route::get('/', 'SetupController@index')->name('index');
	Route::post('/', 'SetupController@setup');
});

// Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
	// Admin authentication routes
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

    Route::group(['namespace' => 'Admin'], function() {
    	Route::get('/', ['as' => 'index', 'uses' => 'MainController@index']);

    	Route::group(['prefix' => 'post', 'as' => 'post.'], function() {
    		Route::get('add', 'PostController@add')->name('add');
    		Route::post('add', 'PostController@store');
    		Route::get('edit/{post}', 'PostController@edit')->name('edit');
    		Route::post('edit/{post}', 'PostController@update');
    	});
    });
});

// Public blog routes
Route::group(['as' => 'blog.', 'middleware' => 'ready'], function() {
	Route::get('/', 'BlogController@index')->name('index');
	Route::get('{post}', 'BlogController@show')->name('show');
});