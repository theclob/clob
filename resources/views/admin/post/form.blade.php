<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">{{ $title }}</h4>
	</div>
	{!! BootForm::open() !!}
		{!! csrf_field() !!}

		@if(isset($post))
			{!! BootForm::bind($post) !!}

			<div class="panel-toolbar">
				<a href="{{ route('blog.show', $post) }}" target="_blank" class="btn btn-default">{{ trans('admin.post.view') }}</a>
				<button type="submit" name="action" value="default" class="hidden"></button>
				<button type="submit" name="action" value="delete" id="deleteBtn" class="btn btn-danger">{{ trans('admin.post.delete') }}</button>
			</div>
		@endif

		<div class="panel-body">
			@if($errors->first())
				<div class="alert alert-danger">{{ trans('app.form_error') }}</div>
			@endif

			<div class="row">
				<div class="col-md-9">
					{!! BootForm::text(trans('admin.post.title'), 'title')->autofocus() !!}
					{!! BootForm::textarea(trans('admin.post.post'), 'markdown_content')
								->rows(25)
								->helpBlock(trans('admin.post.post_help')) !!}
					<hr class="visible-xs visible-sm">
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-sm-4 col-md-12">
							{!! BootForm::text(trans('admin.post.publish_date'), 'published_at')
										->placeholder('YYYY-MM-DD HH:MM:SS')
										->helpBlock(trans('admin.post.publish_date_help')) !!}
						</div>
						<div class="col-sm-8 col-md-12">
							{!! BootForm::text(trans('admin.post.tags'), 'tags')
										->placeholder('e.g. php, laravel, vue')
										->helpBlock(trans('admin.post.tags_help')) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer text-right">
			<button type="submit" name="action" value="save" class="btn btn-primary">{{ trans('app.actions.save') }}</button>
			<a href="{{ route('admin.index') }}" class="btn btn-link">{{ trans('app.actions.cancel') }}</a>
		</div>
	{!! BootForm::close() !!}
</div>