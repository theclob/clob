<?php

namespace Clob\Http\Controllers\Admin\Settings;

use Clob\Http\Controllers\Controller;
use Clob\Http\Requests\SaveBlogSettings;
use Clob\Repositories\Options as OptionRepository;

class BlogController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Blog Settings Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles viewing and modifying the general blog settings.
    |
    */

    /**
     * The option repository instance.
     */
    protected $options;

    /**
     * Create a new controller instance.
     *
     * @param OptionRepository $options
     * @return void
     */
    public function __construct(OptionRepository $options)
    {
        $this->options = $options;

    	$this->middleware('auth');
    }

    /**
     * Display the blog settings view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	$options = $this->options->getBlogSettings();

    	return view('admin.settings.blog')->withOptions($options);
    }

    /**
     * Save the blog settings
     *
     * @param \Clob\Http\Requests\SaveBlogSettings $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(SaveBlogSettings $request)
    {
        $options = $request->only(['title', 'description']);
        $this->options->saveBlogSettings($options);

        return redirect()->back()->withStatus(trans('admin.settings.blog.save_success'));
    }
}
