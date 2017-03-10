@extends('admin.layout', ['title' => trans('admin.menu.edit', ['id' => $item->id])])

@section('content')
	@include('admin.menu.form', ['title' => trans('admin.menu.edit', ['id' => $item->id])])
@endsection

@push('scripts')
	<script>
		var deleteBtn = document.getElementById('deleteBtn');

		deleteBtn.onclick = function(e) {
			if(!confirm('@lang('admin.menu.delete_confirm')')) {
				return false;
			}
		};
	</script>
@endpush

