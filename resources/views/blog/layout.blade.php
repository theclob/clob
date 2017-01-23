<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }} | {{ $options->title }}</title>

	<link rel="stylesheet" href="{{ elixir('css/blog.css') }}">
	@yield('styles')
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
		</div>
	</header>
	@yield('content')

	<div class="footer"><a href="https://github.com/theclob/clob" target="_blank">@lang('app.name.powered')</a></div>

	@yield('scripts')
</body>
</html>