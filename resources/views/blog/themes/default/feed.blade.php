<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>{{ $options->title }}</title>
		<atom:link href="{{ route('blog.feed') }}" rel="self" type="application/rss+xml" />
		<link>{{ route('blog.index') }}</link>
		<description>{{ $options->description }}</description>
		<lastBuildDate>{{ $build_date }}</lastBuildDate>
		<generator>https://clob.io/</generator>
		@foreach($posts as $post)
			<item>
				<title>{{ $post->title }}</title>
				<link>{{ route('blog.show', $post) }}</link>
				<guid>{{ route('blog.show', $post) }}</guid>
				<pubDate>{{ $post->published_at_feed_format }}</pubDate>
				<description><![CDATA[{!! $post->html_content !!}]]></description>
			</item>
		@endforeach
	</channel>
</rss>