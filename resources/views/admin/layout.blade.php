<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }} | @lang('app.name.admin')</title>

	<link rel="stylesheet" href="{{ elixir('css/admin.css') }}">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#clob-admin-navbar" aria-expanded="false">
					<span class="sr-only">@lang('admin.nav.toggle')</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('admin.index') }}">@lang('app.name.admin')</a>
			</div>
			<div class="collapse navbar-collapse" id="clob-admin-navbar">
				<ul class="nav navbar-nav">
					<li @if(str_contains(request()->route()->getName(), 'admin.post.')) class="active" @endif>
						<a href="{{ route('admin.post.index') }}">
							@lang('admin.nav.posts')
							@if(str_contains(request()->route()->getName(), 'admin.post.'))
								<span class="sr-only">@lang('admin.nav.current')</span>
							@endif
						</a>
					</li>
					<li @if(str_contains(request()->route()->getName(), 'admin.page.')) class="active" @endif>
						<a href="{{ route('admin.page.index') }}">
							@lang('admin.nav.pages')
							@if(str_contains(request()->route()->getName(), 'admin.page.'))
								<span class="sr-only">@lang('admin.nav.current')</span>
							@endif
						</a>
					</li>
					<li @if(str_contains(request()->route()->getName(), 'admin.menu.')) class="active" @endif>
						<a href="{{ route('admin.menu.index') }}">
							@lang('admin.nav.menu')
							@if(str_contains(request()->route()->getName(), 'admin.menu.'))
								<span class="sr-only">@lang('admin.nav.current')</span>
							@endif
						</a>
					</li>
				</ul>
				<div class="navbar-right">
					<ul class="nav navbar-nav">
						<li>
							<a href="{{ route('blog.index') }}" target="_blank">@lang('admin.nav.view_blog')</a>
						</li>
						<li @if(str_contains(request()->route()->getName(), 'admin.settings.')) class="active" @endif>
							<a href="{{ route('admin.settings.index') }}">
								@lang('admin.nav.settings')
								@if(str_contains(request()->route()->getName(), 'admin.settings.'))
									<span class="sr-only">@lang('admin.nav.current')</span>
								@endif
							</a>
						</li>
					</ul>
					<form class="navbar-form navbar-logout" method="post" action="{{ route('admin.auth.logout') }}">
						{!! csrf_field() !!}
						<button class="btn btn-info" type="submit">@lang('admin.nav.logout')</button>
					</form>
				</div>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		@yield('content')
	</div>

	<script src="{{ elixir('js/admin.js') }}"></script>
	@stack('scripts')
</body>
</html>