@extends('setup.layout', ['title' => 'Blog Setup', 'step' => 2])

@section('content')
	<p>Now that we have your database configured, it's time to set up some basic information about your blog and create your administrator account.</p>
	<br>

	<div class="form-horizontal">
		<div class="form-group @if($errors->has('title')) has-error @endif">
			<label class="control-label col-sm-3 col-md-2" for="title">Blog Title</label>
			<div class="col-sm-9 col-md-10">
				<input class="form-control" name="title" id="title" value="{{ old('title') }}">
				@if($errors->has('title'))
					<span class="help-block">{{ $errors->first('title') }}</span>
				@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('description')) has-error @endif">
			<label class="control-label col-sm-3 col-md-2" for="description">Description</label>
			<div class="col-sm-9 col-md-10">
				<textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
				@if($errors->has('description'))
					<span class="help-block">{{ $errors->first('description') }}</span>
				@endif
			</div>
		</div>

		<br>
		<p>To create your administrator account, we'll need your email address and password. You'll use these credentials to log in to the <strong>clob</strong> Admin.</p>
		<br>
		<div class="form-group @if($errors->has('name')) has-error @endif">
			<label class="control-label col-sm-3 col-md-2" for="name">Your Name</label>
			<div class="col-sm-9 col-md-10">
				<input class="form-control" name="name" id="name" value="{{ old('name') }}">
				@if($errors->has('name'))
					<span class="help-block">{{ $errors->first('name') }}</span>
				@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('email')) has-error @endif">
			<label class="control-label col-sm-3 col-md-2" for="email">Email Address</label>
			<div class="col-sm-9 col-md-10">
				<input class="form-control" name="email" id="email" value="{{ old('email') }}">
				@if($errors->has('email'))
					<span class="help-block">{{ $errors->first('email') }}</span>
				@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('password')) has-error @endif">
			<label class="control-label col-sm-3 col-md-2" for="password">Password</label>
			<div class="col-sm-9 col-md-10">
				<input type="password" class="form-control" name="password" id="password">
				@if($errors->has('password'))
					<span class="help-block">{{ $errors->first('password') }}</span>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('footer')
	<div class="row">		
		<div class="col-xs-6 col-xs-push-6 text-right">
			<button type="submit" name="action" value="finish" class="btn btn-primary">Finish &raquo;</a>
		</div>
		<div class="col-xs-6 col-xs-pull-6 text-left">
			<button type="submit" name="action" id="previousBtn" value="prev" class="btn btn-link">&laquo; Previous</button>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		var previousBtn = document.getElementById('previousBtn');

		previousBtn.onclick = function(e) {
			if(!confirm('This will delete all clob tables from your database and start fresh. If you wish to continue, click OK.')) {
				return false;
			}
		};
	</script>
@endsection