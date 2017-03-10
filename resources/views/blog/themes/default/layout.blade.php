<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }} | {{ $options->title }}</title>

	<link rel="stylesheet" href="{{ elixir('css/blog.css') }}">
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="alternate" type="application/rss+xml" title="@lang('blog.feed', ['title' => $options->title])" href="{{ route('blog.feed') }}" />
	<meta name="generator" content="clob.io" />
	<link rel="canonical" href="{{ url()->current() }}" />
	@include('blog.themes.default._partials.seo')
</head>
<body>
	<header class="{{ request()->route()->getName() === 'blog.index' ? 'home-header' : 'post-header' }}">
		<div class="container">
			@if(request()->route()->getName() !== 'blog.index')
				<h1><a href="{{ route('blog.index') }}">{{ $options->title }}</a></h1>
			@else
				<h1>{{ $options->title }}</h1>
			@endif
			<p>{{ $options->description }}</p>

			@if($menu->count() > 0)
				<nav>
					<button id="mobileMenuBtn" class="btn btn-block btn-info visible-xs">Menu</button>
					<ul id="mobileMenu">
						@foreach($menu as $item)
							<li>
								@if($item->menuable_type === 'page')
									<a @if(request()->url() === route('blog.show', $item->menuable)) class="active" @endif href="{{ route('blog.show', $item->menuable) }}">{{ $item->label }}</a>
								@elseif($item->menuable_type === 'custom')
									<a href="{{ $item->url }}">{{ $item->label }}</a>
								@endif
							</li>
						@endforeach
					</ul>
				</nav>
			@else
				<div class="nomenu"></div>
			@endif
		</div>
	</header>
	@yield('content')

	<footer>
		@if($social_links->count() > 0)
			@include('blog.themes.default._partials.social_links')
		@endif
		<p>
			<a href="{{ route('blog.feed') }}">RSS Feed</a>
			<span class="separator">&bull;</span>
			<a href="https://github.com/theclob/clob" target="_blank">@lang('app.name.powered')</a>
		</p>
		@if($options->footer_text)
			<p>{{ $options->footer_text }}</p>
		@endif
	</footer>

	<script>
		var mobileMenuBtn = document.getElementById('mobileMenuBtn'),
			mobileMenu = document.getElementById('mobileMenu');

		mobileMenuBtn.onclick = function(e) {
			if(mobileMenu.dataset.status && mobileMenu.dataset.status === 'show') {
				mobileMenu.dataset.status = 'hide';
				mobileMenu.className = '';
			} else {
				mobileMenu.dataset.status = 'show';
				mobileMenu.className = 'show';
			}
		};
	</script>
	@yield('scripts')
</body>
</html>