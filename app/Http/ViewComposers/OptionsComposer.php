<?php

namespace Clob\Http\ViewComposers;

use Clob\Option;
use Illuminate\View\View;

class OptionsComposer
{
    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
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
        $options = Option::first();

        $view->with('options', $options);
    }
}