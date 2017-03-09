<?php

namespace Clob\Providers;

use Clob\Observers\PostObserver;
use Clob\Observers\SocialLinkObserver;
use Clob\Post;
use Clob\SocialLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Attach model observers
        Post::observe(PostObserver::class);
        SocialLink::observe(SocialLinkObserver::class);

        if(DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {
            DB::statement(DB::raw('PRAGMA foreign_keys=1'));
            DB::connection()->getPdo()->sqliteCreateFunction('REGEXP', function ($pattern, $value) {
                mb_regex_encoding('UTF-8');
                return (false !== mb_ereg("/$pattern/", $value)) ? 1 : 0;
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
