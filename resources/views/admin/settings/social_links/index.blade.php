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
					@include('common.alerts')
					<a href="{{ route('admin.settings.social_links.add') }}" class="btn btn-default">@lang('admin.settings.social_links.add')</a>
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
							<th>@lang('admin.settings.social_links.form.type')</th>
							<th>@lang('admin.settings.social_links.form.url')</th>
							<th class="text-right">@lang('admin.settings.social_links.form.position')</th>
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
									<a href="#" class="btn btn-xs btn-default">⬆ <span class="sr-only">@lang('admin.common.move_up')</span></a>
									<a href="#" class="btn btn-xs btn-default">⬇<span class="sr-only">@lang('admin.common.move_down')</span></a>
									<a href="{{ route('admin.settings.social_links.edit', $link) }}" class="btn btn-xs btn-default">Edit</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection