<?php

namespace Clob\Repositories;

use Clob\Option;
use Illuminate\Http\Request;

class Options extends Repository
{
	/**
	 * Sets initial blog configuration.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Clob\User
	 */
	public function setupBlog(Request $request)
	{
		$options = Option::firstOrNew([]);
		$options->title = request()->title;
		$options->description = request()->description ?: null;
		$options->save();

		return $options;
	}
}