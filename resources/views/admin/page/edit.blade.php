@extends('admin.layout', ['title' => trans('admin.page.edit', ['id' => $page->id])])

@section('content')
	@include('admin.page.form', ['title' => trans('admin.page.edit', ['id' => $page->id])])
@endsection

@push('scripts')
	<script>
		var deleteBtn = document.getElementById('deleteBtn');

		deleteBtn.onclick = function(e) {
			if(!confirm('@lang('admin.page.delete_confirm')')) {
				return false;
			}
		};
	</script>
@endpush

