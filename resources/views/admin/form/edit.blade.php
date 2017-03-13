@extends('admin.layout', ['title' => trans('admin.form.edit', ['id' => $form->id])])

@section('content')
	@include('admin.form.form', ['title' => trans('admin.form.edit', ['id' => $form->id])])
@endsection

@push('scripts')
	<script>
		var deleteBtn = document.getElementById('deleteBtn');

		deleteBtn.onclick = function(e) {
			if(!confirm('@lang('admin.form.delete_confirm')')) {
				return false;
			}
		};
	</script>
@endpush

