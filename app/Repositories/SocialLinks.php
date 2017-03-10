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
			'twitter', 'facebook', 'google+', 'linkedin',
            'github', 'gitlab', 'bitbucket',
            'dribbble', 'behance',
			'instagram', 'youtube', 'vimeo', 'soundcloud', 'pinterest',
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
     * Rearrange link order by moving link up/down.
     *
     * @param \Clob\SocialLink $link
     * @param string $direction
     * @return void
     */
    public function rearrange(SocialLink $link, $direction)
    {
        $all = SocialLink::orderBy('position')->get();
        $pos = $all->search($link);

        if(($pos !== 0 && $direction === 'up') || ($pos !== $all->count()-1 && $direction === 'down')) {
            $reordered = [];

            foreach($all as $key => $item) {
                if($direction === 'up' && $key === $pos - 1) {
                    $reordered[] = $link;
                    $reordered[] = $item;
                } elseif($direction === 'down' && $key === $pos + 1) {
                    $reordered[] = $item;
                    $reordered[] = $link;
                } elseif($key !== $pos) {
                    $reordered[] = $item;
                }
            }

            foreach($reordered as $i => $item) {
                $item->position = $i+1;
                $item->save();
            }
        }
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

        // Rearrange position attribute of remaining items.
        $all = SocialLink::orderBy('position')->get();

        foreach($all as $i => $link) {
            $link->position = $i+1;
            $link->save();
        }
    }
}