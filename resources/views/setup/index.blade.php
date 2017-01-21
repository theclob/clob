@extends('setup.layout', ['title' => trans('setup.title')])

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">{{ trans('setup.title') }}</h4>
		</div>
		{!! BootForm::openHorizontal(['sm' => [3, 9], 'md' => [2, 10]]) !!}
			{!! csrf_field() !!}
			<div class="panel-body">
				@include('common.alerts')
				<p>{{ trans('setup.basic_info') }}</p>
				<br>

				{!! BootForm::text(trans('setup.form.title'), 'title')->autofocus()->required() !!}
				{!! BootForm::textarea(trans('setup.form.description'), 'description')->rows(10) !!}

				<br>
				<p>{!! trans('setup.account_info') !!}</p>
				<br>

				{!! BootForm::text(trans('setup.form.name'), 'name')->required() !!}
				{!! BootForm::email(trans('setup.form.email'), 'email')->required() !!}
				{!! BootForm::password(trans('setup.form.password'), 'password')->required() !!}
			</div>

			<div class="panel-footer text-right">
				<button type="submit" class="btn btn-primary">{{ trans('setup.finish') }}</a>
			</div>
		{!! BootForm::close() !!}
	</div>
@endsection