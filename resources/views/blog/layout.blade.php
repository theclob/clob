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
	@yield('content')

	<div class="footer"><a href="https://github.com/theclob/clob" target="_blank">@lang('app.name.powered')</a></div>

	@yield('scripts')
</body>
</html>