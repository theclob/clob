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

Route::group(['prefix' => 'setup', 'as' => 'setup.'], function() {
	Route::get('/', ['as' => 'index', 'uses' => 'SetupController@index']);
	Route::get('database', ['as' => 'database', 'uses' => 'SetupController@database']);
	Route::post('/', ['as' => 'blog', 'uses' => 'SetupController@blog']);	
});
