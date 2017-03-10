<?php

namespace Clob\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Attach view composers to public blog views
        View::composer('blog.*', \Clob\Http\ViewComposers\MenuComposer::class);
        View::composer('blog.*', \Clob\Http\ViewComposers\OptionsComposer::class);
        View::composer('blog.*', \Clob\Http\ViewComposers\SocialLinksComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
