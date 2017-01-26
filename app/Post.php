<?php

namespace Clob;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected const PRETTY_DATE_FORMAT = 'F j, Y';
    protected const LONG_DATE_FORMAT = 'jS F Y @ g:ia';
    protected const SNIPPET_LENGTH = 280;
    protected const OPEN_GRAPH_TITLE_LENGTH = 57;
    protected const OPEN_GRAPH_DESCRIPTION_LENGTH = 297;
    protected const META_DESCRIPTION_LENGTH = 157;

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
     * Formatted publish date
     *
     * @return string
     */
    public function getPublishedAtFormattedAttribute()
    {
        if($this->published_at) {
            return $this->published_at->format(self::PRETTY_DATE_FORMAT);
        }

        return null;
    }

    /**
     * Long Formatted publish date
     *
     * @return string
     */
    public function getPublishedAtLongFormattedAttribute()
    {
        if($this->published_at) {
            return $this->published_at->format(self::LONG_DATE_FORMAT);
        }

        return null;
    }

    /**
     * Atom/RSS friendly formatted publish date
     *
     * @return string
     */
    public function getPublishedAtFeedFormatAttribute()
    {
        if($this->published_at) {
            return $this->published_at->toRfc2822String();
        }

        return null;
    }

    /**
     * OpenGraph friendly formatted publish date
     *
     * @return string
     */
    public function getPublishedAtOpenGraphFormatAttribute()
    {
        if($this->published_at) {
            return $this->published_at->toAtomString();
        }

        return null;
    }

    /**
     * OpenGraph friendly formatted modified date
     *
     * @return string
     */
    public function getUpdatedAtOpenGraphFormatAttribute()
    {
        return $this->updated_at->toAtomString();
    }

    /**
     * Snippet of post for display in index
     *
     * @return string
     */
    public function getSnippetAttribute()
    {
        return str_limit(strip_tags($this->html_content), self::SNIPPET_LENGTH);
    }

    /**
     * OpenGraph friendly snippet of HTML content
     *
     * @return string
     */
    public function getTitleOpenGraphAttribute()
    {
        return str_limit($this->title, self::OPEN_GRAPH_TITLE_LENGTH);
    }

    /**
     * OpenGraph friendly snippet of HTML content
     *
     * @return string
     */
    public function getHtmlContentOpenGraphAttribute()
    {
        // Remove any newlines, strip HTML content
        // and limit number of characters.
        return str_replace(
            ["\r", "\n"],
            ' ',
            str_limit(
                strip_tags($this->html_content),
                self::OPEN_GRAPH_DESCRIPTION_LENGTH
            )
        );
    }

    /**
     * OpenGraph friendly snippet of HTML content
     *
     * @return string
     */
    public function getHtmlContentMetaDescriptionAttribute()
    {
        // Remove any newlines, strip HTML content
        // and limit number of characters.
        return str_replace(
            ["\r", "\n"],
            ' ',
            str_limit(
                strip_tags($this->html_content),
                self::META_DESCRIPTION_LENGTH
            )
        );
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

    /**
     * Get previous post related to a given post
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopePrevious($query, Post $post)
    {
        $published_at = $query->where('published_at', '<', $post->published_at)->max('published_at');
        $post = Post::where('published_at', $published_at)->first();
        $id = $post ? $post->id : null;

        return $query->where('id', $id);
    }

    /**
     * Get next post related to a given post
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeNext($query, Post $post)
    {
        $published_at = $query->where('published_at', '>', $post->published_at)->min('published_at');
        $post = Post::where('published_at', $published_at)->first();
        $id = $post ? $post->id : null;

        return $query->where('id', $id);
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
}
