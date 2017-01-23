@extends('setup.layout', ['title' => trans('setup.title')])

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">@lang('setup.title')</h4>
		</div>
		{!! BootForm::openHorizontal(['sm' => [3, 9], 'md' => [2, 10]]) !!}
			<div class="panel-body">
				@include('common.alerts')
				<p>@lang('setup.basic_info')</p>
				<br>

				{!! BootForm::text(trans('admin.settings.blog.form.title'), 'title')->autofocus()->required() !!}
				{!! BootForm::textarea(trans('admin.settings.blog.form.description'), 'description')->rows(10) !!}

				<br>
				<p>@lang('setup.account_info')</p>
				<br>

				{!! BootForm::text(trans('admin.settings.user.form.name'), 'name')->required() !!}
				{!! BootForm::email(trans('admin.settings.user.form.email'), 'email')->required() !!}
				{!! BootForm::password(trans('setup.form.password'), 'password')->required() !!}
			</div>

			<div class="panel-footer text-right">
				<button type="submit" class="btn btn-primary">@lang('setup.finish')</a>
			</div>
		{!! BootForm::close() !!}
	</div>
@endsection