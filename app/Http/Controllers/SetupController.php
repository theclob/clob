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
use Clob\Repositories\Users as UserRepository;
use Clob\Repositories\Options as OptionRepository;
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
     * The user repository instance.
     */
    protected $users;

    /**
     * The option repository instance.
     */
    protected $options;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $users
     * @param OptionRepository $options
     * @return void
     */
    public function __construct(UserRepository $users, OptionRepository $options)
    {
    	$this->users = $users;
    	$this->options = $options;
    }

	/**
	 * Display the setup view.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return view('setup.index');
	}

	/**
	 * Setup the blog (run migrations and create options and admin user records)
	 *
	 * @param \Clob\Http\Requests\SetupBlog $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function setup(SetupBlog $request)
	{
		try {
			// Run migrations
			$exitCode = Artisan::call('migrate');

			// Save the blog options to the database
			$options = $this->options->setupBlog(request());

			// Create admin user account and log in
			$user = $this->users->createAdmin(request());
			Auth::login($user, true);

			// Redirect to the Admin Dashboard
			return redirect()->route('admin.index');
		} catch(PDOException $e) {
			// Connection error, return with error message
			return redirect()->back()
					->withError(trans('setup.errors.database_connection'))
					->withMessage($e->getMessage());
		} catch(FatalThrowableError | QueryException $e) { // May need to catch more exception types here...
			// Migration error, return with error message
			return redirect()->back()
				->withError(trans('setup.errors.migration_failure', ['file' => $e->getFile()]))
				->withMessage($e->getMessage());
		}
	}
}
