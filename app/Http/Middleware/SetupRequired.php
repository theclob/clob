<?php

namespace Clob\Http\Middleware;

use Clob\Option;
use Clob\User;
use Closure;
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
        if(!Schema::hasTable('options') || !Option::first() || !User::first()) {
            return redirect()->route('setup.index');
        }

        return $next($request);
    }
}
