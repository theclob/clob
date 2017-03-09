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

	/**
     * Set link data values from passed array.
     *
     * @param \Clob\SocialLink $link
     * @param array $data
     * @return \Clob\SocialLink
     */
	private function setLinkData(SocialLink $link, $data)
    {
        $link->type = $data['type'];
        $link->url = $data['url'];

        return $link;
    }

	/**
     * Create a new social link.
     *
     * @param array $data
     * @return \Clob\SocialLink
     */
    public function create($data)
    {
        $link = $this->setLinkData(new SocialLink, $data);
        $link->save();

        return $link;
    }

    /**
     * Update an existing link.
     *
     * @param \Clob\SocialLink $link
     * @param array $data
     * @return \Clob\SocialLink
     */
    public function update(SocialLink $link, $data)
    {
        $link = $this->setLinkData($link, $data);
        $link->save();

        return $link;
    }

    /**
     * Delete an existing link.
     *
     * @param \Clob\SocialLink $link
     * @return void
     */
    public function delete(SocialLink $link)
    {
        $link->delete();
    }
}