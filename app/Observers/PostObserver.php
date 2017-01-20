<?php

namespace Clob\Observers;

use Parsedown;
use Clob\Post;
use Illuminate\Support\Str;

class PostObserver
{
	/**
	 * Generate a slug when creating a new blog post
	 *
	 * @param \Clob\Post $post
	 * @return void
	 */
	public function creating(Post $post)
	{
		$slug = Str::slug($post->title);

		// TODO any way to do this without the raw SQL?
		$count = Post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

		$post->slug = $count ? "{$slug}-{$count}" : $slug;
	}

	/**
	 * Convert Markdown to HTML when saving a blog post
	 *
	 * @param \Clob\Post $post
	 * @return void
	 */
	public function saving(Post $post)
	{
		$parsedown = new Parsedown;

		$post->html_content = $parsedown->text($post->markdown_content);
	}
}