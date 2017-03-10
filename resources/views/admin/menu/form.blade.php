<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">{{ $title }}</h4>
	</div>

	{!! BootForm::openHorizontal(['sm' => [3,9], 'lg' => [2,10]])->name('menu') !!}
		@if(isset($item))
			{!! BootForm::bind($item) !!}
		@endif
		<div class="panel-body">
			@if($errors->first())
				<div class="alert alert-danger">@lang('app.form_error')</div>
			@endif

			{!! BootForm::select(trans('admin.menu.menuable_type'), 'menuable_type')->options($types)->required()->autofocus() !!}
			{!! BootForm::select(trans('admin.menu.menuable_id'), 'menuable_id')->options($pages)->helpBlock(trans('admin.menu.menuable_id_help')) !!}
			<hr>
			{!! BootForm::text(trans('admin.menu.label'), 'label')->required() !!}
			{!! BootForm::text(trans('admin.menu.url'), 'url')->helpBlock(trans('admin.menu.url_help')) !!}
		</div>
		<div class="panel-footer panel-footer-buttons">
			<div class="row">
				<div class="col-xs-6 col-xs-push-6 text-right">
					<button type="submit" class="btn btn-primary">@lang('app.actions.save')</button>

				</div>
				<div class="col-xs-6 col-xs-pull-6 text-left">
					<a href="{{ route('admin.menu.index') }}" class="btn btn-sm btn-link">@lang('admin.menu.cancel_changes')</a>
					@if(isset($item))
						<button type="submit" name="action" value="delete" id="deleteBtn" class="btn btn-link btn-sm btn-link-danger">@lang('admin.menu.delete')</button>
					@endif
				</div>
			</div>
		</div>
	{!! BootForm::close() !!}
</div>

@push('scripts')
	{{-- TODO Show/hide fields based on selection --}}
	<script>
		(function() {
			var form = document.forms['menu'],
				typeField = form.menuable_type,
				itemField = form.menuable_id,
				labelField = form.label,
				urlField = form.url;

			var toggleFields = function() {
				var selected = typeField.options[typeField.selectedIndex].value;

				if(selected === 'page') {
					itemField.disabled = false;
					urlField.disabled = true;
				} else if(selected === 'custom') {
					itemField.disabled = true;
					urlField.disabled = false;
				}
			};

			typeField.onchange = toggleFields;

			toggleFields();
		})();
	</script>
@endpush