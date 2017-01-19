<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }} | clob Admin</title>

	<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body>
	<div class="container">
		<div class="page-heading">
			<div class="row">
				<div class="col-sm-6">
					<h1><a href="{{ route('admin.index') }}">clob Admin</a></h1>
				</div>
				<div class="col-sm-6 text-right">
					<br>
					<form method="post" action="{{ route('admin.auth.logout') }}">
						{!! csrf_field() !!}
						<a href="#" class="btn btn-link">View Blog</a>
						<a href="#" class="btn btn-link">Settings</a>
						<button class="btn btn-default" type="submit">Logout</button>
					</form>
					<br>
				</div>
			</div>
		</div>

		@yield('content')
	</div>

	@yield('scripts')
</body>
</html>