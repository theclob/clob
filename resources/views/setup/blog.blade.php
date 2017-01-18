@extends('setup.layout', ['title' => 'Blog Setup', 'step' => 2])

@section('content')
	<p>Now that we have your database configured, it's time to set up some basic information about your blog and create your administrator account.</p>
	<br>

	<div class="form-horizontal">
		<div class="form-group @if($errors->has('domain')) has-error @endif">
			<label class="control-label col-sm-3" for="domain">Domain Name</label>
			<div class="col-sm-9">
				<input class="form-control" name="domain" id="domain" value="{{ old('domain') }}" placeholder="yourname.com">
				@if($errors->has('domain'))
					<span class="help-block">{{ $errors->first('domain') }}</span>
				@else
					<span class="help-block">Just the domain please, leave out the https:// and any other slashes</span>
				@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('title')) has-error @endif">
			<label class="control-label col-sm-3" for="title">Blog Title</label>
			<div class="col-sm-9">
				<input class="form-control" name="title" id="title" value="{{ old('title') }}">
				@if($errors->has('title'))
					<span class="help-block">{{ $errors->first('title') }}</span>
				@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('description')) has-error @endif">
			<label class="control-label col-sm-3" for="description">Description</label>
			<div class="col-sm-9">
				<textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
				@if($errors->has('description'))
					<span class="help-block">{{ $errors->first('description') }}</span>
				@endif
			</div>
		</div>

		<br>
		<p>To create your administrator account, we'll need your email address and password. We'll send a verification link to this address to make sure we can recover your account should you ever forget your password.</p>
		<br>
		<div class="form-group @if($errors->has('name')) has-error @endif">
			<label class="control-label col-sm-3" for="name">Your Name</label>
			<div class="col-sm-9">
				<input class="form-control" name="name" id="name" value="{{ old('name') }}">
				@if($errors->has('name'))
					<span class="help-block">{{ $errors->first('name') }}</span>
				@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('email')) has-error @endif">
			<label class="control-label col-sm-3" for="email">Email Address</label>
			<div class="col-sm-9">
				<input class="form-control" name="email" id="email" value="{{ old('email') }}">
				@if($errors->has('email'))
					<span class="help-block">{{ $errors->first('email') }}</span>
				@endif
			</div>
		</div>
		<div class="form-group @if($errors->has('password')) has-error @endif">
			<label class="control-label col-sm-3" for="password">Password</label>
			<div class="col-sm-9">
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
		<div class="col-xs-6 text-left">
			<button type="submit" value="prev" class="btn btn-lg btn-link">&laquo; Previous</button>
		</div>
		<div class="col-xs-6 text-right">
			<button type="submit" value="next" class="btn btn-lg btn-primary">Next &raquo;</a>
		</div>
	</div>	
@endsection