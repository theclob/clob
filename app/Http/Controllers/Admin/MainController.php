<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Post;
use Clob\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
    	$posts = Post::recentFirst()->get();

    	return view('admin.index')->withPosts($posts);
    }
}
