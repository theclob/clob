<?php

namespace Clob\Http\Controllers;

use Carbon\Carbon;
use Clob\Option;
use Clob\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
    	$options = Option::first(); //TODO put in a view composer!
    	$posts = Post::where('published_at', '<=', Carbon::now())->orderBy('published_at', 'desc')->get();

    	return view('blog.index')->withOptions($options)->withPosts($posts);
    }

    public function show(Post $post)
    {
    	$options = Option::first();
    	return view('blog.show')->withOptions($options)->withPost($post);
    }
}
