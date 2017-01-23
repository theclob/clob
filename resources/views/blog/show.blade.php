@extends('blog.layout', ['title' => $post->title])

@section('content')
	<h2>{{ $post->title }}</h2>
	{!! $post->html_content !!}
	<hr>
	<p class="small">
		{{ trans('blog.meta', ['user' => $post->user->name, 'date' => $post->published_at->format('jS F Y @ g:ia')]) }}
		@if($post->tags)
			<br><strong>@lang('blog.tags')</strong> {{ $post->tags }}
		@endif
	</p>
@endsection

@section('styles')
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
@endsection

@section('scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
@endsection