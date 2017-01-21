<?php

namespace Clob\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Clob\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Redirect to the admin dashboard after login
     *
     * @return \Illuminate\Routing\UrlGenerator
     */
    protected function redirectTo()
    {
        return route('admin.index');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->middleware('ready');
    }

    /**
     * Override default logout to use custom redirect
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $this->performLogout($request);

        return redirect()->route('admin.auth.login');
    }
}
