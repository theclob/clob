<?php

namespace Clob;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
	protected $fillable = ['menuable_type', 'label'];

	/**
     * Relationship to pages and other types that are menuable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function menuable()
    {
    	return $this->morphTo('menuable');
    }
}
