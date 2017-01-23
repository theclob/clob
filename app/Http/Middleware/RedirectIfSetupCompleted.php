<?php

namespace Clob\Http\Middleware;

use Closure;
use Clob\User;
use Clob\Option;
use PDOException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;
use Symfony\Component\Debug\Exception\FatalThrowableError;

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
        try {
            DB::connection()->getPdo();

            if(Schema::hasTable('options') && Option::first() && User::first()) {
                return redirect()->route('admin.index');
            }
        } catch(PDOException $e) {
            // Connection error, flash error message
            session()->flash('error', trans('setup.errors.database_connection'));
        } catch(FatalThrowableError | QueryException $e) { // May need to catch more exception types here...
            // Migration error, flash error message
            session()->flash('error', trans('setup.errors.migration_failure', ['file' => $e->getFile()]));
        }

        return $next($request);
    }
}
