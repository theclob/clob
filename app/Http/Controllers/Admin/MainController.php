<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Post;
use Clob\Http\Controllers\Controller;

class MainController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Main Admin Controller
    |--------------------------------------------------------------------------
    |
    | This controller provides the routes for the main dashboard section of
    | the clob Admin.
    |
    */

	/**
	 * Blog Admin Dashboard
	 *
	 * @return \Illuminate\View\View
	 */
    public function index()
    {
    	$posts = Post::recentFirst()->get();

    	return view('admin.index')->withPosts($posts);
    }
}
