<?php

namespace App\Http\Controllers;

use App\Option;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use PDOException;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class SetupController extends Controller
{
	public function index()
	{
		// TODO Determine if email already verified - if so, redirect to admin login screen
		// TODO Wrap above logic into middleware so setup can never be reached if already completed
		// TODO Determine if blog setup already run

		// TODO Determine if migrations already run
		if(Schema::hasTable('options')) {
			return view('setup.blog');
		}

		$vars = ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'];
		return view('setup.database')->withVars($vars);
	}

	public function database()
	{
		// Try to connect to database
		try {
			$connection = DB::connection()->getPdo();
		} catch(PDOException $e) { // May need to catch more exception types here...
			// Connection error, return with error message
			$error = 'Whoops, looks like there\'s a problem with your database configuration. Check the details below and try again.';

			return redirect()->back()->withError($error)->withMessage($e->getMessage());
		}

		// Run migrations
		try {
			$exitCode = Artisan::call('migrate');
		} catch(FatalThrowableError | QueryException $e) { // May need to catch more exception types here...
			// Migration error, return with error message
			$error = 'Whoops, looks like there\'s a problem with one of the database migration scripts. Review any changes you made to ' . $e->getFile() . ' and try again.';

			return redirect()->back()->withError($error)->withMessage($e->getMessage());
		}

		// Redirect to index (show Blog Setup screen now)
		return redirect()->back();
	}

	public function blog()
	{
		// TODO Wrap all of this in try catch block, likely to have exceptions when sending the verification email.

		// Validate form
		$this->validate(request(), [
			'domain' => 'required',
			'title' => 'required',
			'name' => 'required',
			'email' => 'required',
			'password' => 'required'
		]);

		$options = Option::firstOrNew([]);
		$options->domain = request()->domain;
		$options->title = request()->title;
		$options->description = request()->description;
		$options->save();

		// Delete any users in the table (shouldn't be any in there, but belt and braces...)
		DB::table('users')->truncate();
		$user = new User;
		$user->name = request()->name;
		$user->email = request()->email;
		// TODO create user verification token and assign it to their record.
		$user->password = Hash::make(request()->password);
		$user->save();

		// TODO Send verification email with token link.

		return redirect()->back();
	}
}
