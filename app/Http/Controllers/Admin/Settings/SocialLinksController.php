<?php

namespace Clob\Http\Controllers\Admin\Settings;

use Clob\Http\Controllers\Controller;
use Clob\Http\Requests\SaveBlogPost;
use Clob\Http\Requests\SaveSocialLink;
use Clob\Repositories\SocialLinks as SocialLinkRepository;
use Clob\SocialLink;
use Illuminate\Http\Request;

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

    protected const ALLOWED_FIELDS = [
        'type', 'url', 'position'
    ];

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

    /**
     * Add New Social Link Page
     *
     * @return \Illuminate\View\View
     */
    public function add()
    {
        $link_types = $this->social_links->getLinkTypes();
        $types = [];
        foreach($link_types as $type) {
            $types[$type] = ucfirst($type);
        }

        return view('admin.settings.social_links.add', compact('types'));
    }

    /**
     * Edit Social Link Page
     *
     * @param SocialLink $link
     * @return \Illuminate\View\View
     */
    public function edit(SocialLink $link)
    {
        $link_types = $this->social_links->getLinkTypes();
        $types = [];
        foreach($link_types as $type) {
            $types[$type] = ucfirst($type);
        }

        return view('admin.settings.social_links.edit')->with(compact('link', 'types'));
    }

    /**
     * Insert a new social link
     *
     * @param \Clob\Http\Requests\SaveSocialLink $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SaveSocialLink $request)
    {
        $link = $request->only(self::ALLOWED_FIELDS);

        $this->social_links->create($link);

        return redirect()->route('admin.settings.social_links.index')->withStatus(trans('admin.settings.social_links.add_success'));
    }

    /**
     * Update an existing social link
     *
     * @param \Clob\Http\Requests\SaveSocialLink $request
     * @param \Clob\SocialLink $link
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SaveSocialLink $request, SocialLink $link)
    {
        // Handle delete post request
        if($request->has('action') && $request->action === 'delete') {
            $this->social_links->delete($link);

            return redirect()->route('admin.settings.social_links.index')->withStatus(trans('admin.settings.social_links.delete_success'));
        }

        $linkData = $request->only(self::ALLOWED_FIELDS);
        $successMsg = trans('admin.settings.social_links.edit_success');

        $this->social_links->update($link, $linkData);

        return redirect()->route('admin.settings.social_links.index')->withStatus($successMsg);
    }

    /**
     * Move the position of a link up or down
     *
     * @param \Clob\SocialLink $link
     * @param string $direction
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function move(SocialLink $link)
    {
        $direction = request()->direction;
        $this->social_links->rearrange($link, $direction);

        return redirect()->route('admin.settings.social_links.index')->withStatus(trans('admin.settings.social_links.move_success'));
    }
}
