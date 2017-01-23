@extends('admin.layout', ['title' => trans('admin.dashboard.title')])

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">{{ trans('admin.post.manage') }}</h4>
		</div>
		@if($posts->count() > 0)
			<div class="panel-body">
				@include('common.alerts')
				<a href="{{ route('admin.post.add') }}" class="btn btn-primary">{{ trans('admin.post.add') }}</a>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>{{ trans('admin.post.title') }}</th>
						<th class="hidden-xs">{{ trans('admin.post.publish_date') }}</th>
						<th class="hidden-xs hidden-sm">{{ trans('admin.post.tags') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<td><a href="{{ route('admin.post.edit', $post) }}">{{ $post->title }}</a></td>
							<td class="hidden-xs">{{ $post->published_at }}</td>
							<td class="hidden-xs hidden-sm">{{ $post->tags }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<div class="panel-body">
				@include('common.alerts')
				<div class="text-center text-muted">
					<a href="{{ route('admin.post.add') }}" class="btn btn-lg btn-primary">{{ trans('admin.post.create') }}</a>
				</div>
			</div>
		@endif
	</div>
@endsection