@if($errors->first())
    <div class="alert alert-danger">{{ trans('app.form_error') }}</div>
@elseif(session('error'))
	<div class="alert alert-danger">{{ session('error') }}</div>
@elseif(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif