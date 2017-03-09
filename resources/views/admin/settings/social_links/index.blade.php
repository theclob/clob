@extends('admin.layout', ['title' => trans('admin.settings.title')])

@section('content')
	<div class="page-header">
		<h2>@lang('admin.settings.title')</h2>
	</div>
	<div class="row">
		<div class="col-sm-3">
			@include('admin.settings.menu')
		</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">@lang('admin.settings.social_links.title')</h4>
				</div>
				<div class="panel-body">
					<a href="#" class="btn btn-default">Add Social Link</a>
				</div>
				<table class="table">
					<colgroup>
						<col style="width: 200px" />
						<col />
						<col style="width: 110px" />
						<col style="width: 200px" />
					</colgroup>
					<thead>
						<tr>
							<th>Type</th>
							<th>URL</th>
							<th class="text-right">Position</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($social_links as $link)
							<tr>
								<td>{{ ucfirst($link->type) }}</td>
								<td>{{ $link->url }}</td>
								<td class="text-right">{{ $link->position }}</td>
								<td class="text-right">
									<a href="#" class="btn btn-xs btn-default">⬆ <span class="sr-only">Move Up</span></a>
									<a href="#" class="btn btn-xs btn-default">⬇<span class="sr-only">Move Down</span></a>
									<a href="#" class="btn btn-xs btn-default">Edit</a>
									<a href="#" class="btn btn-xs btn-default">Delete</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection