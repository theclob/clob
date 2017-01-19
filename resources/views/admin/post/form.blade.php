<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">{{ $title }}</h4>
	</div>
	<form method="post">
		{!! csrf_field() !!}
		<div class="panel-body">
			@if($errors->first())
				<div class="alert alert-danger">
					Whoops, we ran into a problem!
				</div>
			@endif
			<div class="form-horizontal">
				<div class="form-group @if($errors->has('title')) has-error @endif">
					<label class="control-label col-sm-2 col-md-1" for="title">Title</label>
					<div class="col-sm-10 col-md-11">
						<input class="form-control" name="title" id="title" value="{{ old('title') }}">
						@if($errors->has('title'))
							<span class="help-block">{{ $errors->first('title') }}</span>
						@endif
					</div>
				</div>
			</div>
			<hr>
			<div class="form-group @if($errors->has('markdown_content')) has-error @endif">
				<label class="control-label" for="markdown_content">Post</label>
				<textarea class="form-control" name="markdown_content" id="markdown_content" rows="10" placeholder="“There is no greater agony than bearing an untold story inside you.” ― Maya Angelou, I Know Why the Caged Bird Sings">{{ old('markdown_content') }}</textarea>
				<span class="help-block">
					@if($errors->has('markdown_content'))
						{{ $errors->first('markdown_content')}}
					@else
						To format your post, use <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">Markdown</a>.
					@endif
				</span>
			</div>
			<hr>
			<div class="form-horizontal">
				<div class="form-group @if($errors->has('published_at')) has-error @endif">
					<label class="control-label col-sm-3 col-md-2" for="published_at">Publish Date</label>
					<div class="col-sm-5 col-md-4">
						<input class="form-control" name="published_at" id="published_at" placeholder="YYYY-MM-DD HH:MM:SS" value="{{ old('published_at') }}">
					</div>
					<div class="col-sm-9 col-sm-offset-3 col-md-offset-2">
						<span class="help-block">
						@if($errors->has('published_at'))
							{{ $errors->first('published_at') }}
						@else
							Schedule posts for later by setting a publish date in the future. Leave blank to publish immediately.</span>
						@endif
					</div>
				</div>
				<div class="form-group @if($errors->has('tags')) has-error @endif">
					<label class="control-label col-sm-3 col-md-2" for="tags">Tags</label>
					<div class="col-sm-9 col-md-10">
						<input class="form-control" name="tags" id="tags" placeholder="e.g. javascript, node, webpack" value="{{ old('tags') }}">
						<span class="help-block">
							@if($errors->has('tags'))
								{{ $errors->first('tags') }}
							@else
								Separate tags with commas.
							@endif
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer text-right">
			<button type="submit" class="btn btn-primary">Save</button>
			<a href="{{ route('admin.index') }}" class="btn btn-link">Cancel</a>
		</div>
	</form>
</div>