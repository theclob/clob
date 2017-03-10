@extends('admin.layout', ['title' => trans('admin.page.manage')])

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">@lang('admin.page.manage')</h4>
		</div>
		@if($pages->count() > 0)
			<div class="panel-body">
				@include('common.alerts')
				<a href="{{ route('admin.page.add') }}" class="btn btn-primary">@lang('admin.page.add')</a>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>@lang('admin.page.title')</th>
					</tr>
				</thead>
				<tbody>
					@foreach($pages as $page)
						<tr>
							<td><a href="{{ route('admin.page.edit', $page) }}">{{ $page->title }}</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<div class="panel-body">
				@include('common.alerts')
				<div class="text-center text-muted">
					<a href="{{ route('admin.page.add') }}" class="btn btn-lg btn-primary">@lang('admin.page.create')</a>
				</div>
			</div>
		@endif
	</div>
@endsection