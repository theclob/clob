<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Http\Controllers\Controller;
use Clob\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
    	$posts = Post::orderBy('published_at', 'desc')->get();
    	return view('admin.index')->withPosts($posts);
    }
}
