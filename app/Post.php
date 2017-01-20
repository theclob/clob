<?php

namespace Clob;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are dates.
     *
     * @var array
     */
	protected $dates = [
        'published_at', 'created_at', 'updated_at'
    ];

    /**
     * Override the key used for implicit model binding on post routes
     *
     * @return string
     */
	public function getRouteKeyName()
	{
		return 'slug';
	}

    /**
     * Relationship to the User who wrote this Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	return $this->belongsTo('Clob\User');
    }

    /**
     * Return posts that have a publish date in the past
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopePublished($query)
    {
    	return $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Return posts in order of most recent first
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeRecentFirst($query)
    {
    	return $query->orderBy('published_at', 'desc');
    }
}
