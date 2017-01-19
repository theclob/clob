<?php

namespace Clob;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $dates = ['published_at', 'created_at', 'updated_at'];

	public function getRouteKeyName()
	{
		return 'slug';
	}

    public function user()
    {
    	return $this->belongsTo('Clob\User');
    }
}
