<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Http\Controllers\Controller;
use Clob\Http\Requests\SavePage;
use Clob\Post;
use Clob\Repositories\Pages as PageRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Page Admin Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles adding, editing and deleting site pages using
    | the clob Admin.
    |
    */

    /**
     * The page repository instance.
     */
    protected $pages;

    protected const ALLOWED_FIELDS = [
        'title', 'slug', 'subtitle', 'markdown_content',
        'seo_title', 'seo_description', 'seo_image_url'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PageRepository $pages)
    {
        $this->pages = $pages;

        $this->middleware('auth');
    }

    /**
     * Page Index
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pages = $this->pages->paged();

        return view('admin.page.index')->withPages($pages);
    }

    /**
     * "Add New Page" Page
     *
     * @return \Illuminate\View\View
     */
    public function add()
    {
    	return view('admin.page.add');
    }

    /**
     * "Edit Page" Page
     *
     * @param Post $page
     * @return \Illuminate\View\View
     */
    public function edit(Post $page)
    {
        return view('admin.page.edit')->with(compact('page'));
    }

    /**
     * Insert a new page
     *
     * @param \Clob\Http\Requests\SavePage $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SavePage $request)
    {
        $user = $request->user();
        $pageData = $request->only(self::ALLOWED_FIELDS);

        $page = $this->pages->create($user, $pageData);

        if($request->menu_label) {
            $page->menu_items()->create([
                'menuable_type' => 'page',
                'label' => $request->menu_label,
            ]);
        }

    	return redirect()->route('admin.page.index')->withStatus(trans('admin.page.add_success'));
    }

    /**
     * Update an existing page
     *
     * @param \Clob\Http\Requests\SavePage $request
     * @param \Clob\Post $page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SavePage $request, Post $page)
    {
        // Handle delete post request
        if($request->has('action') && $request->action === 'delete') {
            $this->pages->delete($page);

            return redirect()->route('admin.page.index')->withStatus(trans('admin.page.delete_success'));
        }

        $pageData = $request->only(self::ALLOWED_FIELDS);
        $successMsg = trans('admin.page.edit_success');

        $this->pages->update($page, $pageData);

        return redirect()->route('admin.page.index')->withStatus($successMsg);
    }
}
