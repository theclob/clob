<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Clob\Http\Requests\SaveBlogPost;
use Clob\Http\Controllers\Controller;

class PostController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Post Admin Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles adding, editing and deleting blog posts using
    | the clob Admin.
    |
    */

    /**
     * Add New Post Page
     *
     * @return \Illuminate\View\View
     */
    public function add()
    {
    	return view('admin.post.add');
    }

    /**
     * Edit Post Page
     *
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit')->withPost($post);
    }

    /**
     * Set post data values from request object
     *
     * @param \Clob\Post $post
     * @return \Clob\Post
     */
    private function setPostData(Post $post)
    {
        $post->title = request()->title;
        $post->markdown_content = request()->markdown_content; // The PostObserver class auto-converts this to HTML
        $post->published_at = request()->published_at ?: Carbon::now(); // Default publish date to now if null
        $post->tags = request()->tags ?: null;

        return $post;
    }

    /**
     * Insert a new blog post
     *
     * @param \Clob\Http\Requests\SaveBlogPost $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SaveBlogPost $request)
    {
    	$post = $this->setPostData(new Post);
    	$user = request()->user();
    	$user->posts()->save($post);

    	return redirect()->route('admin.index')->withStatus(trans('admin.post.add_success'));
    }

    /**
     * Update or delete an existing blog post
     *
     * @param \Clob\Http\Requests\SaveBlogPost $request
     * @param \Clob\Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SaveBlogPost $request, Post $post)
    {
        // If the request contains an "action" property with a value "delete", delete the post
        if(request()->action === 'delete') {
            $post->delete();

            return redirect()->route('admin.index')->withStatus(trans('admin.post.delete_success'));
        }

        // Otherwise update the post
        $post = $this->setPostData($post);
        $post->save();

        return redirect()->route('admin.index')->withStatus(trans('admin.post.edit_success'));
    }
}
