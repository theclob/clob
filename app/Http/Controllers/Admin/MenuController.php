<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Http\Controllers\Controller;
use Clob\Http\Requests\SaveMenuItem;
use Clob\MenuItem;
use Clob\Post;
use Clob\Repositories\MenuItems as MenuRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Menu Admin Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles managing the site menu using
    | the clob Admin.
    |
    */

    /**
     * The menu repository instance.
     */
    protected $menu;

    protected const ALLOWED_FIELDS = [
        'menuable_type', 'menuable_id', 'label', 'url'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MenuRepository $menu)
    {
        $this->menu = $menu;

        $this->middleware('auth');
    }

    /**
     * Menu Index
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $menu = $this->menu->all();
        return view('admin.menu.index', compact('menu'));
    }

    /**
     * Get item types for the form dropdown
     *
     * @return array
     */
    private function getItemTypes()
    {
        return [
            'page' => 'Page',
            'custom' => 'Custom Link',
        ];
    }

    /**
     * Get pages for the form dropdown.
     *
     * @return array
     */
    private function getPages(Post $current = null)
    {
        $pages = Post::pages()
            ->whereDoesntHave('menu_items')
            ->orWhere('id', $current ? $current->id : null)
            ->alpha()
            ->get();

        $pages = $pages->mapWithKeys(function($item) {
            return [$item['id'] => $item['title']];
        })->all();

        return $pages;
    }

    /**
     * Add Menu Item Page
     *
     * @return \Illuminate\View\View
     */
    public function add()
    {
        $types = $this->getItemTypes();
        $pages = $this->getPages();

        return view('admin.menu.add', compact('types', 'pages'));
    }

    /**
     * Edit Menu Item Page
     *
     * @param Post $page
     * @return \Illuminate\View\View
     */
    public function edit(MenuItem $item)
    {
        $types = $this->getItemTypes();
        $pages = $this->getPages($item->menuable);

        return view('admin.menu.edit')->with(compact('item', 'types', 'pages'));
    }

    /**
     * Insert a new menu item
     *
     * @param \Clob\Http\Requests\SaveMenuItem $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SaveMenuItem $request)
    {
        $item = $request->only(self::ALLOWED_FIELDS);
        $this->menu->create($item);

        return redirect()->route('admin.menu.index')->withStatus(trans('admin.menu.add_success'));
    }

    /**
     * Update an existing menu item
     *
     * @param \Clob\Http\Requests\SaveMenuItem $request
     * @param \Clob\Post $page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SaveMenuItem $request, MenuItem $item)
    {
        // Handle delete post request
        if($request->has('action') && $request->action === 'delete') {
            $this->menu->delete($item);

            return redirect()->route('admin.menu.index')->withStatus(trans('admin.menu.delete_success'));
        }

        $itemData = $request->only(self::ALLOWED_FIELDS);
        $successMsg = trans('admin.menu.edit_success');

        $this->menu->update($item, $itemData);

        return redirect()->route('admin.menu.index')->withStatus($successMsg);
    }

    /**
     * Move the position of a menu item up or down
     *
     * @param \Clob\MenuItem $item
     * @param string $direction
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function move(MenuItem $item)
    {
        $direction = request()->direction;
        $this->menu->rearrange($item, $direction);

        return redirect()->route('admin.menu.index')->withStatus(trans('admin.menu.move_success'));
    }
}
