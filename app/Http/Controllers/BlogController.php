<?php

namespace Clob\Http\Controllers;

use Clob\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
    	$posts = Post::published()->recentFirst()->get();

    	return view('blog.index')->withPosts($posts);
    }

    public function show(Post $post)
    {
    	return view('blog.show')->withPost($post);
    }
}
