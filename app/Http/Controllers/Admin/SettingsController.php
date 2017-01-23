<?php

namespace Clob\Http\Controllers\Admin;

use Clob\Http\Controllers\Controller;

class SettingsController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Admin Settings Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles viewing and modifying the blog's settings.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Settings root action (redirects to blog settings route).
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
    	return redirect()->route('admin.settings.blog');
    }
}
