<?php

namespace Clob\Http\ViewComposers;

use Clob\SocialLink;
use Illuminate\View\View;
use Clob\Repositories\SocialLinks as SocialLinkRepository;

class SocialLinksComposer
{
    /**
     * The social links repository instance.
     */
    protected $social_links;

    /**
     * Create a new profile composer.
     *
     * @param SocialLinkRepository $social_links
     * @return void
     */
    public function __construct(SocialLinkRepository $social_links)
    {
        $this->social_links = $social_links;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Get the social links and attach to the view
        $social_links = $this->social_links->getLinks();

        $view->with('social_links', $social_links);
    }
}