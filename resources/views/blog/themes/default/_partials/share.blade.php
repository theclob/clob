<p class="share">
	@lang('blog.share.title')&nbsp;&nbsp;
	<a href="https://news.ycombinator.com/submitlink?u={{ route('blog.show', $post) }}&t={{ $post->title }}">@lang('blog.share.hackernews')</a>
	<span class="separator">&bull;</span>
	<a href="http://www.reddit.com/submit?url={{ route('blog.show', $post) }}&title={{ $post->title }}">@lang('blog.share.reddit')</a>
	<span class="separator">&bull;</span>
	<a href="https://twitter.com/intent/tweet?text=%22{{ urlencode($post->title) }}%22&url={{ route('blog.show', $post) }}&via={{ config('app.twitter_username') }}">@lang('blog.share.twitter')</a>
	<span class="separator">&bull;</span>
	<a href="mailto:?subject={{ $post->title }}&body=@lang('blog.share.email_body', ['title' => $post->title, 'link' => route('blog.show', $post)])">@lang('blog.share.email')</a>
</p>