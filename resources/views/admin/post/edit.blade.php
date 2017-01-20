@extends('admin.layout', ['title' => trans('admin.post.edit', ['id' => $post->id])])

@section('content')
	@include('admin.post.form', ['title' => trans('admin.post.edit', ['id' => $post->id])])
@endsection

@section('scripts')
	<script>
		var deleteBtn = document.getElementById('deleteBtn');

		deleteBtn.onclick = function(e) {
			if(!confirm('{{ trans('admin.post.delete_confirm') }}')) {
				return false;
			}
		};
	</script>
@endsection