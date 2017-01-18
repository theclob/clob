<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }} | clob Setup</title>

	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>clob Setup</h1>
		</div>

		<form method="post">
			{!! csrf_field() !!}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Step {{ $step }} of 3 - {{ $title }}</h4>
				</div>
				<div class="panel-body">
					@yield('content')
				</div>
				@yield('table')
				<div class="panel-body">
					@yield('after-table')
				</div>
				<div class="panel-footer text-right">
					@yield('footer')
				</div>
			</div>
		</form>
	</div>
</body>
</html>