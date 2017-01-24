<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Post;
use Clob\Http\Requests\SaveBlogPost;
use Clob\Http\Controllers\Controller;
use Clob\Repositories\Posts as PostRepository;

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
     * The post repository instance.
     */
    protected $posts;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;

        $this->middleware('auth');
    }

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
     * Insert a new blog post
     *
     * @param \Clob\Http\Requests\SaveBlogPost $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SaveBlogPost $request)
    {
        $user = $request->user();
        $post = $request->only(['title', 'subtitle', 'markdown_content', 'published_at', 'tags']);

        $this->posts->create($user, $post);

    	return redirect()->route('admin.index')->withStatus(trans('admin.post.add_success'));
    }

    /**
     * Update an existing blog post
     *
     * @param \Clob\Http\Requests\SaveBlogPost $request
     * @param \Clob\Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SaveBlogPost $request, Post $post)
    {
        $postData = $request->only(['title', 'subtitle', 'markdown_content', 'published_at', 'tags']);
        $this->posts->update($post, $postData);

        return redirect()->route('admin.index')->withStatus(trans('admin.post.edit_success'));
    }

    /**
     * Delete an existing blog post
     *
     * @param \Clob\Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Post $post)
    {
        $this->posts->delete($post);

        return redirect()->route('admin.index')->withStatus(trans('admin.post.delete_success'));
    }
}
