@extends('admin.layout', ['title' => 'Dashboard'])


@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">Manage Posts</h4>
		</div>
		@if($posts->count() > 0)
			<div class="panel-body">
				@if(session()->has('status'))			
					<div class="alert alert-success">{{ session('status') }}</div>			
				@endif
				<a href="{{ route('admin.post.add') }}" class="btn btn-primary">Add New Post</a>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>Title</th>
						<th class="hidden-xs">Publish Date</th>
						<th class="hidden-xs hidden-sm">Tags</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<td>{{ $post->title }}</td>
							<td class="hidden-xs">{{ $post->published_at }}</td>
							<td class="hidden-xs hidden-sm">{{ $post->tags }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<div class="panel-body text-center text-muted">
				<a href="{{ route('admin.post.add') }}" class="btn btn-lg btn-primary">Create your first post.</a>
			</div>
		@endif
	</div>
@endsection