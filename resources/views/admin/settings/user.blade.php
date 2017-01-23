@extends('admin.layout', ['title' => trans('admin.settings.title')])

@section('content')
	<div class="page-header">
		<h2>@lang('admin.settings.title')</h2>
	</div>
	<div class="row">
		<div class="col-sm-3">
			@include('admin.settings.menu')
		</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">@lang('admin.settings.user.title')</h4>
				</div>
				{!! BootForm::openHorizontal(['md' => [3, 9]]) !!}
					{!! BootForm::bind(Auth::user()) !!}
					{!! method_field('put') !!}
					<div class="panel-body">
						@include('common.alerts')
						{!! BootForm::text(trans('admin.settings.user.form.name'), 'name')->autofocus()->required() !!}
						{!! BootForm::email(trans('admin.settings.user.form.email'), 'email')->required() !!}
					</div>
					<div class="panel-footer text-right">
						<button type="submit" class="btn btn-primary">@lang('app.actions.save')</button>
						<a href="{{ route('admin.index') }}" class="btn btn-link">@lang('app.actions.cancel')</a>
					</div>
				{!! BootForm::close() !!}
			</div>
		</div>
	</div>
@endsection