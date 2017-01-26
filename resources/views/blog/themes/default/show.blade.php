@extends('blog.themes.default.layout', ['title' => $post->title])

@section('content')
	<article class="post">
		<div class="container">
			@if(request()->route()->getName() === 'admin.post.show')
				<br>
				<div class="alert alert-info">
					<p><strong>@lang('admin.post.preview.title')</strong></p>
					<p>
						@lang('admin.post.preview.info')
						@if($post->published_at && !$post->published_at->isFuture())
							@lang('admin.post.preview.published_url')
						@else
							@lang('admin.post.preview.unpublished_url')
						@endif
					</p>
					<p>
						<a href="{{ route('blog.show', $post) }}">{{ route('blog.show', $post) }}</a>
					</p>
				</div>
			@endif
			<header>
				<p class="post-info">
					{{ $post->published_at_formatted }}
					@if($post->read_time_minutes)
						<span class="separator">&bull;</span>
						@lang('blog.read_time', ['minutes' => $post->read_time_minutes])
					@endif
				</p>
				<h1>{{ $post->title }}</h1>
				@if($post->subtitle)
					<h2>{{ $post->subtitle }}</h2>
				@endif
			</header>
			<div class="post-content">
				{!! $post->html_content !!}
			</div>
			<div class="meta">
				{{ trans('blog.meta', ['date' => $post->published_at_long_formatted]) }}
				@if($post->tags)
					<br><strong>@lang('blog.tags')</strong> {{ $post->tags }}
				@endif
				@if($next_post or $previous_post)
					<div class="post-links clearfix">
						@if($next_post)
							<div class="pull-right">
								<small class="text-muted">@lang('blog.next')</small>
								<a href="{{ route('blog.show', $next_post) }}">{{ $next_post->title }}</a>
							</div>
						@endif
						@if($previous_post)
							<small class="text-muted">@lang('blog.previous')</small>
							<a href="{{ route('blog.show', $previous_post) }}">{{ $previous_post->title }}</a>
						@endif
					</div>
				@endif
			</div>
			@if(request()->route()->getName() !== 'admin.post.show')
				@include('blog.themes.default._partials.share')
				<hr>
				<p class="back">
					<a href="{{ route('blog.index') }}">@lang('blog.back')</a>
				</p>
			@else
				<p class="back">
					<a href="{{ route('admin.post.edit', $post) }}">@lang('admin.post.preview.back')</a>
				</p>
			@endif
		</div>
	</article>
@endsection

@section('scripts')
	<script src="{{ elixir('js/blog.js') }}"></script>
@endsection