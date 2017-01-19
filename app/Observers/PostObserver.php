<?php

namespace Clob\Observers;

use Parsedown;
use Clob\Post;
use Illuminate\Support\Str;

class PostObserver
{
	public function creating(Post $post)
	{
		$slug = Str::slug($post->title);
		$count = Post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

		if($count) {
			$slug = "{$slug}-{$count}";
		}

		$post->slug = $slug;
	}

	public function saving(Post $post)
	{
		$parsedown = new Parsedown;

		$post->html_content = $parsedown->text($post->markdown_content);
	}
}