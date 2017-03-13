<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">{{ $title }}</h4>
	</div>

	{!! BootForm::open() !!}
		@if(isset($form))
			{!! BootForm::bind($form) !!}
		@endif
		<div class="panel-body">
			@if($errors->first())
				<div class="alert alert-danger">@lang('app.form_error')</div>
			@endif

			<div class="row">
				<div class="@if(!isset($form)) col-sm-8 @else col-sm-12 @endif">
					{!! BootForm::text(trans('admin.form.title'), 'title')->autofocus()->required() !!}
					{!! BootForm::inputGroup(trans('admin.form.slug'), 'slug')
								->beforeAddon(url()->to('/') . '/')
								->helpBlock(trans('admin.form.slug_help')) !!}
				</div>
				@if(!isset($form))
					<div class="col-sm-4">
						<div class="well">
							{!! BootForm::text(trans('admin.form.menu_label'), 'menu_label')
										->placeholder(trans('admin.form.menu_label_placeholder'))
										->helpBlock(trans('admin.form.menu_label_help')) !!}
						</div>
					</div>
				@endif
			</div>

			{!! BootForm::text(trans('admin.form.subtitle'), 'subtitle') !!}
			{!! BootForm::textarea(trans('admin.form.form'), 'markdown_content')
						->rows(25)
						->required()
						->helpBlock(trans('admin.form.form_help')) !!}

			<hr>
			<h3>@lang('admin.post.seo.section')</h3>
			<div class="row">
				<div class="col-md-3 col-md-push-9">
					<div class="well">
						<p><strong>@lang('admin.form.seo.help_title')</strong></p>
						<p>@lang('admin.form.seo.help_text')</p>
					</div>
				</div>
				<div class="col-md-9 col-md-pull-3">
					{!! BootForm::text(trans('admin.form.seo.title'), 'seo_title')
								->maxLength(60)
								->helpBlock(trans('admin.form.seo.title_help')) !!}
					{!! BootForm::textarea(trans('admin.form.seo.description'), 'seo_description')
								->rows(5)
								->maxLength(160)
								->helpBlock(trans('admin.form.seo.description_help')) !!}
					{!! BootForm::text(trans('admin.form.seo.image_url'), 'seo_image_url')
								->helpBlock(trans('admin.form.seo.image_url_help')) !!}
				</div>
			</div>
		</div>
		<div class="panel-footer panel-footer-buttons">
			<div class="row">
				<div class="col-xs-6 col-xs-push-6 text-right">
					<button type="submit" class="btn btn-primary">@lang('app.actions.save')</button>

				</div>
				<div class="col-xs-6 col-xs-pull-6 text-left">
					<a href="{{ route('admin.form.index') }}" class="btn btn-sm btn-link">@lang('admin.form.cancel_changes')</a>
					@if(isset($form))
						<button type="submit" name="action" value="delete" id="deleteBtn" class="btn btn-link btn-sm btn-link-danger">@lang('admin.form.delete')</button>
					@endif
				</div>
			</div>
		</div>
	{!! BootForm::close() !!}
</div>