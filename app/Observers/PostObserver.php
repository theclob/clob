<?php

namespace Clob\Observers;

use Parsedown;
use Clob\Post;
use Illuminate\Support\Str;

class PostObserver
{
	public function creating(Post $post)
	{
		// Generate a unique slug for a post on creation
		$slug = Str::slug($post->title);
		// TODO any way to do this without the raw SQL?
		$count = Post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

		if($count) {
			$slug = "{$slug}-{$count}";
		}

		$post->slug = $slug;
	}

	public function saving(Post $post)
	{
		// Convert Markdown to HTML on save
		$parsedown = new Parsedown;

		$post->html_content = $parsedown->text($post->markdown_content);
	}
}