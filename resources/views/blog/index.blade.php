@extends('blog.layout', ['title' => trans('blog.home')])

@section('content')
	<section class="posts">
		<div class="container">
			@forelse($posts as $post)
				<a class="post" href="{{ route('blog.show', $post) }}">
					<h2>{{ $post->title }}</h2>
					<p class="snippet">{{ str_limit(strip_tags($post->html_content), 220) }}</p>
					<p class="meta">
						@lang('blog.meta', ['date' => $post->published_at->format('F j, Y')])
						@if($post->tags)
							<br><strong>Tags:</strong> {{ $post->tags }}
						@endif
					</p>
				</a>
			@empty
				<p>@lang('blog.no_posts')</p>
			@endforelse
		</div>
	</section>
@endsection