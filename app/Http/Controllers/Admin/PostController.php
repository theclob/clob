<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Clob\Http\Requests\SaveBlogPost;
use Clob\Http\Controllers\Controller;

class PostController extends Controller
{
    public function add()
    {
    	return view('admin.post.add');
    }

    private function setPostData(Post $post)
    {
        $post->title = request()->title;
        $post->markdown_content = request()->markdown_content;
        $post->published_at = request()->published_at ?: Carbon::now();
        $post->tags = request()->tags ?: null;

        return $post;
    }

    public function store(SaveBlogPost $request)
    {
    	$post = $this->setPostData(new Post);
    	$user = request()->user();
    	$user->posts()->save($post);

    	return redirect()->route('admin.index')->withStatus('Post added successfully.');
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit')->withPost($post);
    }

    public function update(SaveBlogPost $request, Post $post)
    {
        // Handle delete post request
        if(request()->action === 'delete') {
            $post->delete();

            return redirect()->route('admin.index')->withStatus('Post deleted successfully.');
        }

        $post = $this->setPostData($post);
        $post->save();

        return redirect()->route('admin.index')->withStatus('Post updated successfully.');
    }
}
