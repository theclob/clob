@extends('blog.layout', ['title' => 'Blog Home'])

@section('content')
	@forelse($posts as $post)
		<div class="media">
			<div class="media-body">
				<h4 class="media-heading"><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h4>
				<small class="text-muted">Posted by {{ $post->user->name }} on {{ $post->published_at->format('jS F Y @ g:ia') }}</small>
			</div>
		</div>
	@empty
		<p>No posts to display.</p>
	@endforelse
@endsection