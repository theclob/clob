@extends('blog.layout', ['title' => trans('blog.home')])

@section('content')
	@forelse($posts as $post)
		<div class="media">
			<div class="media-body">
				<h4 class="media-heading"><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h4>
				<small class="text-muted">{{ trans('blog.meta', ['user' => $post->user->name, 'date' => $post->published_at->format('jS F Y @ g:ia')]) }}</small>
			</div>
		</div>
	@empty
		<p>{{ trans('blog.no_posts') }}</p>
	@endforelse
@endsection