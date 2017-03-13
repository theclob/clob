<?php

namespace Clob\Http\Controllers;

use Carbon\Carbon;
use Clob\Http\Requests\SaveSubmission;
use Clob\Post;
use Clob\Repositories\Pages as PageRepository;
use Clob\Repositories\Posts as PostRepository;
use Clob\Repositories\FormSubmissions as FormSubmissionRepository;
use Illuminate\Http\Request;

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
     * The page repository instance.
     */
    protected $pages;

    /**
     * The form submissions repository instance.
     */
    protected $form_submissions;

    protected const ALLOWED_FIELDS = [
        'name', 'email', 'message',
    ];

    /**
     * Create a new controller instance.
     *
     * @param PostRepository $posts
     * @return void
     */
    public function __construct(PostRepository $posts, PageRepository $pages, FormSubmissionRepository $form_submissions)
    {
        $this->posts = $posts;
        $this->pages = $pages;
        $this->form_submissions = $form_submissions;

        $this->middleware('track')->only('index', 'show');
    }

    /**
     * Displays the blog home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	$posts = $this->posts->published();

    	return view('blog.themes.default.index', compact('posts'));
    }

    /**
     * Displays a blog post
     *
     * @param \Clob\Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        if($post->type === 'post' && (!$post->published_at || $post->published_at->isFuture())) {
            abort(404);
        }

        if($post->type === 'post') {
            $previous_post = $this->posts->previous($post);
            $next_post = $this->posts->next($post);

            return view('blog.themes.default.show', compact('post', 'previous_post', 'next_post'));
        }

    	return view('blog.themes.default.show', compact('post'));
    }

    /**
     * Process form submission
     *
     * @param \Clob\Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function process(SaveSubmission $request, Post $post)
    {
        // Only relevant for form post types
        if($post->type !== 'form') abort(404);

        // Save submission record
        $submissionData = $request->only(self::ALLOWED_FIELDS);
        $submission = $this->form_submissions->create($post, $submissionData);

        return redirect()->back()->withStatus(trans('blog.form.submit_success'));
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

    /**
     * XML Sitemap
     *
     * @return \Illuminate\View\View
     */
    public function sitemap()
    {
        $posts = $this->posts->published();
        $pages = $this->pages->all();
        $view = view('blog.sitemap', compact('posts', 'pages'));

        return response($view)
            ->header('Content-Type', 'text/xml');
    }

    /**
     * Robots.txt
     *
     * @return \Illuminate\View\View
     */
    public function robots()
    {
        $view = view('blog.robots');
        return response($view)
            ->header('Content-Type', 'text/plain');
    }
}
