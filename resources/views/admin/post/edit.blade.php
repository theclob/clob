@extends('admin.layout', ['title' => "Edit Post (ID: $post->id)"])

@section('content')
	@include('admin.post.form', ['title' => "Edit Post (ID: $post->id)"])
@endsection

@section('scripts')
	<script>
		var deleteBtn = document.getElementById('deleteBtn');

		deleteBtn.onclick = function(e) {
			if(!confirm('This will permanently delete this post. If you wish to continue, click OK.')) {
				return false;
			}
		};
	</script>
@endsection