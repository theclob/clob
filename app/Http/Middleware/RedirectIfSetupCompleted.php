<?php

namespace Clob\Http\Middleware;

use Clob\Option;
use Clob\User;
use Closure;
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
        if(Schema::hasTable('options')) {
            //  If blog setup already run
            if(Option::first() && User::first()) {
                return redirect()->route('admin.index');
            }
        }
        
        return $next($request);
    }
}
