@extends('admin.layout', ['title' => trans('admin.dashboard.title')])

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">@lang('admin.post.manage')</h4>
		</div>
		@if($posts->count() > 0)
			<div class="panel-body">
				@include('common.alerts')
				<a href="{{ route('admin.post.add') }}" class="btn btn-primary">@lang('admin.post.add')</a>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>@lang('admin.post.title')</th>
						<th class="hidden-xs">@lang('admin.post.publish_date')</th>
						<th class="hidden-xs">@lang('admin.post.read_time')</th>
						<th class="hidden-xs hidden-sm">@lang('admin.post.tags')</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<td><a href="{{ route('admin.post.edit', $post) }}">{{ $post->title }}</a></td>
							<td class="hidden-xs">{{ $post->published_at }}</td>
							<td class="hidden-xs">@lang('blog.read_time', ['minutes' => $post->read_time_minutes])</td>
							<td class="hidden-xs hidden-sm">{{ $post->tags }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<div class="panel-body">
				@include('common.alerts')
				<div class="text-center text-muted">
					<a href="{{ route('admin.post.add') }}" class="btn btn-lg btn-primary">@lang('admin.post.create')</a>
				</div>
			</div>
		@endif
	</div>
@endsection