<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">{{ $title }}</h4>
	</div>
	{!! BootForm::open() !!}
		{!! csrf_field() !!}
		@if(isset($post))
			{!! BootForm::bind($post) !!}

			<div class="panel-toolbar">
				<a href="{{ route('blog.show', $post) }}" target="_blank" class="btn btn-default">View Post</a>
				{!! BootForm::submit('hidden submit')->addClass('hidden')->attribute('tabindex', -1)->attribute('name', 'action')->attribute('value', 'default') !!}
				{!! BootForm::submit('Delete Post')->addClass('btn-danger')->attribute('name', 'action')->attribute('value', 'delete')->attribute('id', 'deleteBtn') !!}
			</div>

		@endif
		<div class="panel-body">
			@if($errors->first())
				<div class="alert alert-danger">
					Whoops, we ran into a problem!
				</div>
			@endif
			<div class="row">
				<div class="col-md-9">
					{!! BootForm::text('Title', 'title') !!}
					{!! BootForm::textarea('Post', 'markdown_content')
								->rows(25)
								->helpBlock('To format your post, use <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">Markdown</a>.') !!}
					<hr class="visible-xs visible-sm">
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-sm-4 col-md-12">
							{!! BootForm::text('Publish Date', 'published_at')
										->placeholder('YYYY-MM-DD HH:MM:SS')
										->helpBlock('Schedule posts for later by setting a publish date in the future. Leave blank to publish immediately.') !!}
						</div>
						<div class="col-sm-8 col-md-12">
							{!! BootForm::text('Tags', 'tags')
										->placeholder('e.g. php, laravel, vue')
										->helpBlock('Separate tags with commas.') !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer text-right">
			<button type="submit" name="action" value="save" class="btn btn-primary">Save</button>
			<a href="{{ route('admin.index') }}" class="btn btn-link">Cancel</a>
		</div>
	{!! BootForm::close() !!}
</div>