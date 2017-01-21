<?php

namespace Clob\Http\Middleware;

use Clob\Option;
use Clob\User;
use Closure;
use PDOException;
use Illuminate\Support\Facades\DB;
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
        try {
            DB::connection()->getPdo();

            if(!Schema::hasTable('options') || !Option::first() || !User::first()) {
                return redirect()->route('setup.index');
            }
        } catch(PDOException $e) {
            // Connection error, return with error message
            session()->flash('error', trans('setup.errors.database_connection'));
        }


        return $next($request);
    }
}
