<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Http\Controllers\Controller;
use Clob\Repositories\Posts as PostRepository;

class MainController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Main Admin Controller
    |--------------------------------------------------------------------------
    |
    | This controller provides the routes for the main dashboard section of
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
     * @param PostRepository $posts
     * @return void
     */
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;

        $this->middleware('auth');
    }

	/**
	 * Blog Admin Dashboard
	 *
	 * @return \Illuminate\View\View
	 */
    public function index()
    {
    	$posts = $this->posts->all();

    	return view('admin.index')->withPosts($posts);
    }
}
