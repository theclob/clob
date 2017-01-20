<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }} | {{ trans('app.name.admin') }}</title>

	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h1><a href="{{ route('admin.index') }}">{{ trans('app.name.admin') }}</a></h1>
			</div>
			<div class="col-sm-6 text-right">
				<br>
				<form method="post" action="{{ route('admin.auth.logout') }}">
					{!! csrf_field() !!}
					<a href="{{ route('blog.index') }}" target="_blank" class="btn btn-link">{{ trans('admin.nav.view_blog') }}</a>
					<a href="#" class="btn btn-link">{{ trans('admin.settings.title') }}</a>
					<button class="btn btn-default" type="submit">{{ trans('admin.nav.logout') }}</button>
				</form>
				<br>
			</div>
		</div>

		@yield('content')
	</div>

	@yield('scripts')
</body>
</html>