<?php

namespace Clob\Http\ViewComposers;

use Illuminate\View\View;
use Clob\Option;

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
        $options = Option::first();

        $view->with('options', $options);
    }
}