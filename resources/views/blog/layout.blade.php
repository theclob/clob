<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }} | {{ $options->title }}</title>

	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
	@yield('styles')
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1><a href="{{ route('blog.index') }}">{{ $options->title }}</a></h1>
		</div>

		<div class="row">
			<div class="col-sm-8 col-md-9">
				@yield('content')
			</div>
			<div class="col-sm-4 col-md-3">
				<br class="visible-xs">
				<br class="visible-xs">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">About</h4>
					</div>
					<div class="panel-body">
						{{ $options->description }}
					</div>
				</div>
			</div>
		</div>

		<hr>
		<div class="small text-center"><a href="https://github.com/theclob/clob" target="_blank">Powered by clob</a></div>
	</div>

	@yield('scripts')
</body>
</html>