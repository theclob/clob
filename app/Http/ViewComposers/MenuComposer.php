<?php

namespace Clob\Http\ViewComposers;

use Illuminate\View\View;
use Clob\Repositories\MenuItems as MenuRepository;

class MenuComposer
{
    /**
     * The menu repository instance.
     */
    protected $menu;

    /**
     * Create a new profile composer.
     *
     * @param MenuRepository $menu
     * @return void
     */
    public function __construct(MenuRepository $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Get the blog options and attach to the view
        $menu = $this->menu->all();

        $view->with('menu', $menu);
    }
}