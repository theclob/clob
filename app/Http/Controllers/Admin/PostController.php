<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Post;
use Carbon\Carbon;
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

    protected const ALLOWED_FIELDS = [
        'title', 'slug', 'subtitle', 'markdown_content', 'published_at', 'tags',
        'seo_title', 'seo_description', 'seo_image_url'
    ];

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
     * Post Index
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->posts->paged();

        return view('admin.post.index')->withPosts($posts);
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
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit')->with(compact('post'));
    }

    /**
     * Preview Post - enables admins to view posts,
     * even unpublished ones to see what the output
     * will look like.
     *
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('blog.themes.default.show')->with(compact('post'));
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
        $post = $request->only(self::ALLOWED_FIELDS);

        if(!$request->published_at && $request->has('action') && $request->action === 'publish') {
            $post['published_at'] = Carbon::now();
        }

        $post = $this->posts->create($user, $post);

        if($request->has('action') && $request->action === 'preview') {
            return redirect()->route('admin.post.show', $post);
        }

    	return redirect()->route('admin.post.index')->withStatus(trans('admin.post.add_success'));
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
        // Handle delete post request
        if($request->has('action') && $request->action === 'delete') {
            $this->posts->delete($post);

            return redirect()->route('admin.post.index')->withStatus(trans('admin.post.delete_success'));
        }

        $postData = $request->only(self::ALLOWED_FIELDS);
        $successMsg = trans('admin.post.edit_success');

        // If publish request, set published_at to current date/time
        if(!$request->published_at && $request->has('action') && $request->action === 'publish') {
            $postData['published_at'] = Carbon::now();
            $successMsg = trans('admin.post.publish_success');
        }

        $post = $this->posts->update($post, $postData);

        // If preview request, show the blog post preview
        if($request->has('action') && $request->action === 'preview') {
            return redirect()->route('admin.post.show', $post);
        }

        return redirect()->route('admin.post.index')->withStatus($successMsg);
    }
}
