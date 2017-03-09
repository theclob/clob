<?php

namespace Clob\Repositories;

use Clob\SocialLink;

class SocialLinks extends Repository
{
	/*
    |--------------------------------------------------------------------------
    | Social Links Repository
    |--------------------------------------------------------------------------
    |
    | This class handles saving social links data to the database.
    |
    */

	/**
	 * Retrieve the social links.
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function getLinks()
	{
		return SocialLink::orderBy('position')->get();
	}

	/**
	 * Get a list of the avaialble social link types.
	 *
	 * @return array
	 */
	public function getLinkTypes()
	{
		$types = [
			'twitter', 'facebook', 'github', 'gitlab', 'bitbucket', 'linkedin',
			'instagram', 'youtube', 'vimeo', 'soundcloud', 'pinterest',
			'dribbble', 'behance',
		];

		return $types;
	}
}