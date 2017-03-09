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
					<h4 class="panel-title">
						@if(isset($link))
							@lang('admin.settings.social_links.edit', ['id' => $link->id])
						@else
							@lang('admin.settings.social_links.add')
						@endif
					</h4>
				</div>
				{!! BootForm::openHorizontal(['md' => [3, 9]]) !!}
					<div class="panel-body">
						@if(isset($link))
							{!! BootForm::bind($link) !!}
						@endif
						<div class="panel-body">
							@if($errors->first())
								<div class="alert alert-danger">@lang('app.form_error')</div>
							@endif

							{!! BootForm::text(trans('admin.settings.social_links.form.type'), 'type')->autofocus()->required() !!}
							{!! BootForm::text(trans('admin.settings.social_links.form.url'), 'url')->required() !!}

						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-xs-6 col-xs-push-6 text-right">
								<button type="submit" class="btn btn-primary">{{ trans('app.actions.save') }}</button>
								<a href="{{ route('admin.settings.social_links.index') }}" class="btn btn-link">@lang('app.actions.cancel')</a>
							</div>
							<div class="col-xs-6 col-xs-pull-6 text-left">
								@if(isset($link))
									<button type="submit" name="action" value="delete" id="deleteBtn" class="btn btn-link btn-sm btn-link-danger">@lang('admin.settings.social_links.delete')</button>
								@endif
							</div>
						</div>
					</div>
				{!! BootForm::close() !!}
			</div>
		</div>
	</div>
</div>