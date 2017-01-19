<?php

namespace Clob\Http\Controllers\Admin;

use Carbon\Carbon;
use Clob\Http\Controllers\Controller;
use Clob\Post;
use Illuminate\Http\Request;
use Parsedown;

class PostController extends Controller
{
    public function add()
    {
    	return view('admin.post.add');
    }

    public function store()
    {
    	$this->validate(request(), [
    		'title' => 'required',
    		'markdown_content' => 'required',
    		'published_at' => 'date'
    	]);

    	$parsedown = new Parsedown;

    	$post = new Post;
    	$post->title = request()->title;
    	$post->markdown_content = request()->markdown_content;
    	$post->html_content = $parsedown->text($post->markdown_content);
    	$post->published_at = request()->published_at ?: Carbon::now();
    	$post->tags = request()->tags ?: null;

    	$user = request()->user();
    	$user->posts()->save($post);

    	return redirect()->route('admin.index')->withStatus('Post added successfully.');
    }
}
