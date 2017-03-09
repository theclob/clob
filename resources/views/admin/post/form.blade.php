<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">{{ $title }}</h4>
	</div>

	{!! BootForm::open() !!}
		@if(isset($post))
			{!! BootForm::bind($post) !!}
		@endif
		<div class="panel-body">
			@if($errors->first())
				<div class="alert alert-danger">@lang('app.form_error')</div>
			@endif

			<div class="row">
				<div class="col-md-9">
					{!! BootForm::text(trans('admin.post.title'), 'title')->autofocus()->required() !!}
					{!! BootForm::inputGroup(trans('admin.post.slug'), 'slug')
								->beforeAddon(url()->to('/') . '/')
								->helpBlock(trans('admin.post.slug_help')) !!}
					{!! BootForm::text(trans('admin.post.subtitle'), 'subtitle') !!}
					{!! BootForm::textarea(trans('admin.post.post'), 'markdown_content')
								->rows(25)
								->required()
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
			<hr>
			<h3>@lang('admin.post.seo.section')</h3>
			<div class="row">
				<div class="col-md-3 col-md-push-9">
					<div class="well">
						<p><strong>@lang('admin.post.seo.help_title')</strong></p>
						<p>@lang('admin.post.seo.help_text')</p>
					</div>
				</div>
				<div class="col-md-9 col-md-pull-3">
					{!! BootForm::text(trans('admin.post.seo.title'), 'seo_title')
								->maxLength(60)
								->helpBlock(trans('admin.post.seo.title_help')) !!}
					{!! BootForm::textarea(trans('admin.post.seo.description'), 'seo_description')
								->rows(5)
								->maxLength(160)
								->helpBlock(trans('admin.post.seo.description_help')) !!}
					{!! BootForm::text(trans('admin.post.seo.image_url'), 'seo_image_url')
								->helpBlock(trans('admin.post.seo.image_url_help')) !!}
				</div>
			</div>
		</div>
		<div class="panel-footer panel-footer-buttons">
			<div class="row">
				<div class="col-xs-6 col-xs-push-6 text-right">
					@if(!isset($post) or !$post->published_at)
						<button type="submit" class="btn btn-default">@lang('admin.post.save_draft')</button>
						<button type="submit" name="action" value="preview" formtarget="_blank" class="btn btn-default">@lang('admin.post.preview.button')</button>
						<button type="submit" name="action" value="publish" class="btn btn-primary">@lang('admin.post.publish')</button>
					@else
						<button type="submit" class="btn btn-primary">@lang('app.actions.save')</button>
						<button type="submit" name="action" value="preview" formtarget="_blank" class="btn btn-default">@lang('admin.post.preview.button')</button>
					@endif
				</div>
				<div class="col-xs-6 col-xs-pull-6 text-left">
					<a href="{{ route('admin.index') }}" class="btn btn-sm btn-link">@lang('admin.post.cancel_changes')</a>
					@if(isset($post))
						<button type="submit" name="action" value="delete" id="deleteBtn" class="btn btn-link btn-sm btn-link-danger">@lang('admin.post.delete')</button>
					@endif
				</div>
			</div>
		</div>
	{!! BootForm::close() !!}
</div>