<?php

namespace Clob\Http\Middleware;

use Closure;
use Clob\User;
use Clob\Option;
use Illuminate\Support\Facades\Schema;

class SetupRequired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // If migrations or blog setup haven't been run, redirect to the Setup page
        if(!Schema::hasTable('options') || !Option::first() || !User::first()) {
            return redirect()->route('setup.index');
        }

        return $next($request);
    }
}
