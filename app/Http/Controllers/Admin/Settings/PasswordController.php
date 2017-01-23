<?php

namespace Clob\Http\Controllers\Admin\Settings;

use Clob\Http\Controllers\Controller;
use Clob\Http\Requests\SavePasswordSettings;
use Clob\Repositories\Users as UserRepository;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Settings Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles changing the user's account password.
    |
    */

    /**
     * The user repository instance.
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;

    	$this->middleware('auth');
    }

    /**
     * Display the change password view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	return view('admin.settings.password');
    }

    /**
     * Save the new user password.
     *
     * @param \Clob\Http\Requests\SavePasswordSettings $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(SavePasswordSettings $request)
    {
        $user = $request->user();
        $password = $request->current_password;
        $new_password = $request->new_password;

        // Check current password
    	if(!$this->users->checkPassword($user, $password)) {
    		return redirect()->back()
                ->withErrors(['current_password' => trans('admin.settings.password.incorrect')]);
    	}

    	$this->users->changePassword($user, $new_password);

        return redirect()->back()
            ->withStatus(trans('admin.settings.password.save_success'));
    }
}
