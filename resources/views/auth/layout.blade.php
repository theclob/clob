<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} | @lang('app.name.admin')</title>

    <link href="{{ elixir('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <br>
    @yield('content')
    <div class="text-center">
    	<a class="small" target="_blank" href="{{ route('blog.index') }}">@lang('admin.nav.view_blog')</a>
    </div>
</body>
</html>
