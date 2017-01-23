<?php

namespace Clob\Http\Controllers\Admin\Settings;

use Clob\Http\Controllers\Controller;
use Clob\Http\Requests\SaveUserSettings;
use Clob\Repositories\Users as UserRepository;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Settings Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles viewing and modifying the user account settings.
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
     * Display the user settings view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	return view('admin.settings.user');
    }

    /**
     * Save the user settings
     *
     * @param \Clob\Http\Requests\SaveUserSettings $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(SaveUserSettings $request)
    {
        $user = $request->user();
        $userData = $request->only(['name', 'email']);
        $this->users->update($user, $userData);

        return redirect()->back()->withStatus(trans('admin.settings.user.save_success'));
    }
}
