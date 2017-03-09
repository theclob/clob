<?php

namespace Clob\Observers;

use Clob\SocialLink;
use Illuminate\Support\Str;

class SocialLinkObserver
{
	/**
	 * Set position to 1 higher than the current max position
	 *
	 * @param \Clob\SocialLink $socialLink
	 * @return void
	 */
	public function creating(SocialLink $socialLink)
	{
		$socialLink->position = SocialLink::count() + 1;
	}
}