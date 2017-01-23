<?php

namespace Clob\Http\ViewComposers;

use Clob\Option;
use Illuminate\View\View;
use Clob\Repositories\Options as OptionRepository;

class OptionsComposer
{
    /**
     * The option repository instance.
     */
    protected $options;

    /**
     * Create a new profile composer.
     *
     * @param OptionRepository $options
     * @return void
     */
    public function __construct(OptionRepository $options)
    {
        $this->options = $options;
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
        $options = $this->options->getBlogSettings();

        $view->with('options', $options);
    }
}