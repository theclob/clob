<?php

namespace Clob\Observers;

use Parsedown;
use Clob\Post;
use Illuminate\Support\Str;

class PostObserver
{
	/**
	 * Convert Markdown to HTML when saving a blog post
	 *
	 * @param \Clob\Post $post
	 * @return void
	 */
	public function saving(Post $post)
	{
		// If no slug on post, auto-generate from title
		if(!$post->slug) {
			$slug = Str::slug($post->title);

			// TODO any way to do this without the raw SQL?
			$count = Post::whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$'")->count();

			$post->slug = $count ? "{$slug}-{$count}" : $slug;
		}

		// Convert Markdown to HTML
		$parsedown = new Parsedown;
		$post->html_content = $parsedown->text($post->markdown_content);

		// Calculate reading time
		$post->word_count = str_word_count(strip_tags($post->html_content));
		$reading_time = floor($post->word_count / 225); // 275 wpm reading speed
		$post->read_time_minutes = $reading_time ?: 1; // set at 1 minute if 0
	}
}