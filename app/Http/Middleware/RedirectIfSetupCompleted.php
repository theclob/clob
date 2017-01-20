<?php

namespace Clob\Http\Middleware;

use Closure;
use Clob\User;
use Clob\Option;
use Illuminate\Support\Facades\Schema;

class RedirectIfSetupCompleted
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
        // If migrations and blog setup have already been run, redirect to the clob Admin
        if(Schema::hasTable('options') && Option::first() && User::first()) {
            return redirect()->route('admin.index');
        }

        return $next($request);
    }
}
