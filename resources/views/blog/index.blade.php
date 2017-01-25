@extends('blog.layout', ['title' => trans('blog.home')])

@section('content')
	<section class="posts">
		<div class="container">
			@forelse($posts as $post)
				<a class="post" href="{{ route('blog.show', $post) }}">
					<p class="post-info">
						{{ $post->published_at_formatted }}
						@if($post->read_time_minutes)
							<span class="separator">&bull;</span>
							@lang('blog.read_time', ['minutes' => $post->read_time_minutes])
						@endif
					</p>
					<header>
						<h2>{{ $post->title }}</h2>
						@if($post->subtitle)
							<h3>{{ $post->subtitle }}</h3>
						@endif
					</header>
					<p class="snippet">{{ $post->snippet }}</p>
					@if($post->tags)
						<p class="meta"><strong>@lang('blog.tags')</strong> {{ $post->tags }}</p>
					@endif
				</a>
			@empty
				<p>@lang('blog.no_posts')</p>
			@endforelse
		</div>
	</section>
@endsection