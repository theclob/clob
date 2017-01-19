<?php

namespace Clob\Http\Controllers;

use Clob\Mail\VerifyAdminEmail;
use Clob\Option;
use Clob\User;
use Carbon\Carbon;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use PDOException;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class SetupController extends Controller
{

	private function generateToken()
	{
		$hashKey = config('app.key');

		if(Str::startsWith($hashKey, 'base64:')) {
			$hashKey = base64_decode(substr($hashKey, 7));
		}

		return hash_hmac('sha256', Str::random(40), $hashKey);
	}

	public function index()
	{
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
		if(request()->action === 'prev') {
			try {
				$exitCode = Artisan::call('migrate:reset');

				return redirect()->back();
			} catch(FatalThrowableError | QueryException $e) {
				$error = 'Whoops, looks like there\'s a problem with one of the database migration scripts. Review any changes you made to ' . $e->getFile() . ' and try again.';

				return redirect()->back()->with($error)->withMessage($e->getMessage());
			}
		}

		// Validate form
		$this->validate(request(), [
			'title' => 'required',
			'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
		]);

		$options = Option::firstOrNew([]);
		$options->title = request()->title;
		$options->description = request()->description ?: null;
		$options->save();

		// Delete any users in the table (shouldn't be any in there, but belt and braces...)
		DB::table('users')->truncate();
		$user = new User;
		$user->name = request()->name;
		$user->email = request()->email;
		$user->password = bcrypt(request()->password);
		$user->save();

		Auth::login($user, true);

		return redirect()->back();
	}
}
