@extends('admin.layout', ['title' => trans('admin.settings.title')])

@section('content')
	<div class="page-header">
		<h2>{{ trans('admin.settings.title')}}</h2>
	</div>
	<div class="row">
		<div class="col-sm-3">
			@include('admin.settings.menu')
		</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">{{ trans('admin.settings.password.title') }}</h4>
				</div>
				{!! BootForm::openHorizontal(['md' => [3, 9]]) !!}
					{!! method_field('put') !!}
					<div class="panel-body">
						@include('common.alerts')
						{!! BootForm::password(trans('admin.settings.password.form.current'), 'current_password')->autofocus()->required() !!}
						{!! BootForm::password(trans('admin.settings.password.form.new'), 'new_password')->required() !!}
						{!! BootForm::password(trans('admin.settings.password.form.confirm'), 'new_password_confirmation')->required() !!}
					</div>
					<div class="panel-footer text-right">
						<button type="submit" class="btn btn-primary">{{ trans('app.actions.save') }}</button>
						<a href="{{ route('admin.index') }}" class="btn btn-link">{{ trans('app.actions.cancel') }}</a>
					</div>
				{!! BootForm::close() !!}
			</div>
		</div>
	</div>
@endsection