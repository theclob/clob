<?php

namespace Clob\Observers;

use Clob\SocialLink;

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
		$socialLink->position = SocialLink::max('position') + 1;
	}
}