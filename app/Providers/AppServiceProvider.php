<?php

namespace Clob\Providers;

use Clob\Post;
use Clob\MenuItem;
use Clob\SocialLink;
use Clob\FormSubmission;
use Clob\Observers\PostObserver;
use Illuminate\Support\Facades\DB;
use Clob\Observers\MenuItemObserver;
use Clob\Observers\SocialLinkObserver;
use Illuminate\Support\ServiceProvider;
use Clob\Observers\FormSubmissionObserver;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'page' => 'Clob\Post',
            'custom' => 'Clob\Post',
        ]);

        // Attach model observers
        Post::observe(PostObserver::class);
        MenuItem::observe(MenuItemObserver::class);
        SocialLink::observe(SocialLinkObserver::class);
        FormSubmission::observe(FormSubmissionObserver::class);

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
