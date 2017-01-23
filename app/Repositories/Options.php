<?php

namespace Clob\Repositories;

use Clob\Option;

class Options extends Repository
{
	/*
    |--------------------------------------------------------------------------
    | Options Repository
    |--------------------------------------------------------------------------
    |
    | This class handles saving options/settings data to the database.
    |
    */

	/**
	 * Sets initial blog configuration.
	 *
	 * @param array $data
	 * @return \Clob\Option
	 */
	public function setupBlog($data)
	{
		$options = Option::firstOrNew([]);

		$options->title = $data['title'];
		$options->description = $data['description'] ?: null;
		$options->save();

		return $options;
	}

	/**
	 * Retrieve the current blog settings.
	 *
	 * @return \Clob\Option
	 */
	public function getBlogSettings()
	{
		return Option::firstOrFail();
	}

	/**
	 * Saves blog settings
	 *
	 * @param array $data
	 * @return \Clob\Option
	 */
	public function saveBlogSettings($data)
	{
		$options = Option::firstOrFail();

        $options->title = $data['title'];
        $options->description = $data['description'] ?: null;
        $options->save();

        return $options;
	}
}