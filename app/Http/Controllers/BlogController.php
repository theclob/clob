<?php

namespace Clob\Http\Controllers;

use Clob\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Public Blog Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the main public views of the blog.
    |
    */

    /**
     * Displays the blog home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	$posts = Post::published()->recentFirst()->get();

    	return view('blog.index')->withPosts($posts);
    }

    /**
     * Displays a blog post
     *
     * @param \Clob\Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
    	return view('blog.show')->withPost($post);
    }
}
