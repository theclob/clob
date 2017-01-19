<?php

namespace Clob\Observers;

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
}