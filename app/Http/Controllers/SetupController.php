<?php

namespace Clob\Http\Controllers;

use Clob\User;
use Clob\Option;
use PDOException;
use Clob\Http\Requests\SetupBlog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\QueryException;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class SetupController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Setup Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the Blog Setup screens that install the database
    | and configure the initial blog settings and user account.
    |
    */

	/**
	 * Display the appropriate setup view depending on where in the setup process
	 * the user is.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		// If the migrations have been run, show the Blog Setup screen
		if(Schema::hasTable('options')) {
			return view('setup.blog');
		}
		// Otherwise show the Database Setup screen

		// Array of environment variables to be read and displayed to the user
		$vars = [
			'DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'
		];

		return view('setup.database')->withVars($vars);
	}

	/**
	 * Setup the database (run migrations using the migrate Artisan command)
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function database()
	{
		try {
			// Try to connect to database
			$connection = DB::connection()->getPdo();

			// Run migrations
			$exitCode = Artisan::call('migrate');


			// Redirect to index (show Blog Setup screen now)
			return redirect()->back();
		} catch(PDOException $e) {
			// Connection error, return with error message
			$error = 'Whoops, looks like there\'s a problem with your database configuration. Check the details below and try again.';

			return redirect()->back()->withError($error)->withMessage($e->getMessage());
		} catch(FatalThrowableError | QueryException $e) { // May need to catch more exception types here...
			// Migration error, return with error message
			$error = 'Whoops, looks like there\'s a problem with one of the database migration scripts. Review any changes you made to ' . $e->getFile() . ' and try again.';

			return redirect()->back()->withError($error)->withMessage($e->getMessage());
		}
	}

	/**
	 * Save the blog options and admin user records to the database.
	 *
	 * @return void
	 */
	private function saveOptionsAndUser()
	{
		// Save the blog options to the database
		$options = Option::firstOrNew([]);
		$options->title = request()->title;
		$options->description = request()->description ?: null;
		$options->save();

		// Delete any users in the table (shouldn't be any in there, but belt and braces...)
		DB::table('users')->truncate();

		// Create the admin user account
		$user = new User;
		$user->name = request()->name;
		$user->email = request()->email;
		$user->password = bcrypt(request()->password); // Hash the user's password
		$user->save();

		// Log the user in immediately (and remember them)
		Auth::login($user, true);
	}

	/**
	 * Setup the blog options and create the admin user account
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function blog(SetupBlog $request)
	{
		// If the request contains an "action" property with a value "prev", reset database migrations
		if(request()->action === 'prev') {
			try {
				Artisan::call('migrate:reset');

				return redirect()->back();
			} catch(FatalThrowableError | QueryException $e) {
				$error = 'Whoops, looks like there\'s a problem with one of the database migration scripts. Review any changes you made to ' . $e->getFile() . ' and try again.';

				return redirect()->back()->with($error)->withMessage($e->getMessage());
			}
		}

		$this->saveOptionsAndUser();

		// Redirect to the Admin Dashboard
		return redirect()->route('admin.index');
	}
}
