<?php

namespace Clob;

use Carbon\Carbon;
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

    public function scopePublished($query)
    {
    	return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeRecentFirst($query)
    {
    	return $query->orderBy('published_at', 'desc');
    }
}
