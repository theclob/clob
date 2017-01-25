<?php

namespace Clob;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
	/**
	 * Trim newlines from description for SEO tags.
	 *
	 * @return string
	 */
    public function getDescriptionTrimmedAttribute()
    {
    	return str_replace(["\r", "\n"], ' ', $this->description);
    }
}
