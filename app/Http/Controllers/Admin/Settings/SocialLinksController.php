<?php

namespace Clob\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use Clob\Http\Controllers\Controller;
use Clob\Repositories\SocialLinks as SocialLinkRepository;

class SocialLinksController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Social Links Settings Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles viewing and modifying the social links settings.
    |
    */

    /**
     * The social links repository instance.
     */
    protected $social_links;

    /**
     * Create a new controller instance.
     *
     * @param SocialLinkRepository $users
     * @return void
     */
    public function __construct(SocialLinkRepository $social_links)
    {
        $this->social_links = $social_links;

    	$this->middleware('auth');
    }

    /**
     * Display the social links settings view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $social_links = $this->social_links->getLinks();
    	return view('admin.settings.social_links.index', compact('social_links'));
    }
}
