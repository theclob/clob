<?php

namespace Clob\Http\Controllers;

use Clob\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Clob\Repositories\Posts as PostRepository;

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
     * The post repository instance.
     */
    protected $posts;

    /**
     * Create a new controller instance.
     *
     * @param PostRepository $posts
     * @return void
     */
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Displays the blog home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	$posts = $this->posts->published();

    	return view('blog.index', compact('posts'));
    }

    /**
     * Displays a blog post
     *
     * @param \Clob\Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        if(!$post->published_at || $post->published_at->isFuture()) {
            abort(404);
        }

        $previous_post = $this->posts->previous($post);
        $next_post = $this->posts->next($post);

    	return view('blog.show', compact('post', 'previous_post', 'next_post'));
    }

    /**
     * Displays the blog home page
     *
     * @return \Illuminate\View\View
     */
    public function feed()
    {
        $posts = $this->posts->published();
        $build_date = Carbon::now()->toRfc2822String();
        $view = view('blog.feed', compact('posts', 'build_date'));

        return response($view)
            ->header('Content-Type', 'application/rss+xml');
    }
}
