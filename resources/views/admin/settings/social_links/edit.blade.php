@extends('admin.layout', ['title' => trans('admin.settings.social_links.edit', ['id' => $link->id])])

@section('content')
	@include('admin.settings.social_links.form', ['title' => trans('admin.settings.social_links.edit', ['id' => $link->id])])
@endsection

@push('scripts')
	<script>
		var deleteBtn = document.getElementById('deleteBtn');

		deleteBtn.onclick = function(e) {
			if(!confirm('@lang('admin.settings.social_links.delete_confirm')')) {
				return false;
			}
		};
	</script>
@endpush

