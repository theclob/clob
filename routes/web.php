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
Route::group(['prefix' => 'setup', 'as' => 'setup.'], function() {
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
        // Admin Dashboard
    	Route::get('/', ['as' => 'index', 'uses' => 'MainController@index']);

        // Blog Post Management
    	Route::group(['prefix' => 'post', 'as' => 'post.'], function() {
    		Route::get('add', 'PostController@add')->name('add');
    		Route::post('add', 'PostController@store');
    		Route::get('edit/{post}', 'PostController@edit')->name('edit');
            Route::post('edit/{post}', 'PostController@update');
            Route::get('show/{post}', 'PostController@show')->name('show');
            Route::post('preview/{post}', 'PostController@preview');
    	});

        // Blog Settings
    	Route::group(['prefix' => 'settings', 'as' => 'settings.'], function() {
    		Route::get('/', 'SettingsController@index')->name('index');

            Route::group(['namespace' => 'Settings'], function() {
                Route::get('blog', 'BlogController@index')->name('blog');
                Route::put('blog', 'BlogController@save');

                Route::group(['prefix' => 'social-links', 'as' => 'social_links.'], function() {
                    Route::get('/', 'SocialLinksController@index')->name('index');
                    Route::get('add', 'SocialLinksController@add')->name('add');
                    Route::post('add', 'SocialLinksController@store');
                    Route::get('edit/{link}', 'SocialLinksController@edit')->name('edit');
                    Route::post('edit/{link}', 'SocialLinksController@update');
                });

                Route::get('user', 'UserController@index')->name('user');
                Route::put('user', 'UserController@save');
                Route::get('password', 'PasswordController@index')->name('password');
                Route::put('password', 'PasswordController@save');
            });
    	});
    });
});