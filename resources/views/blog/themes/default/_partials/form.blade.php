@if(session()->has('status'))
	<div class="alert alert-success">{{ session('status') }}</div>
@else
	@if($errors->first())
		<div class="alert alert-danger">@lang('app.form_error')</div>
	@endif

	{!! BootForm::openHorizontal(['sm' => [2, 10]]) !!}
		{!! BootForm::text(trans('blog.form.name'), 'name')->autofocus() !!}
		{!! BootForm::email(trans('blog.form.email'), 'email')->required() !!}
		{!! BootForm::textarea(trans('blog.form.message'), 'message')->required() !!}
		{!! BootForm::submit(trans('blog.form.send'))->addClass('btn-primary') !!}
	{!! BootForm::close() !!}
@endif