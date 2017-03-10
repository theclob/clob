@extends('admin.layout', ['title' => trans('admin.menu.manage')])

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">@lang('admin.menu.manage')</h4>
		</div>
		@if($menu->count() > 0)
			<div class="panel-body">
				@include('common.alerts')
				<a href="{{ route('admin.menu.add') }}" class="btn btn-primary">@lang('admin.menu.add')</a>
			</div>
			<table class="table">
				<colgroup>
					<col style="width: 50px" />
					<col />
					<col style="width: 200px" />
				</colgroup>
				<thead>
					<tr>
						<th class="text-right">@lang('admin.menu.position')</th>
						<th>@lang('admin.menu.item')</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($menu as $item)
						<tr>
							<td class="text-right">{{ $item->position }}.</td>
							<td>
								<strong>{{ $item->label }}</strong><br>
								@if($item->menuable_type === 'page')
									<small>@lang('admin.menu.page_link_to', ['url' => route('blog.show', $item->menuable), 'text' => $item->menuable->title])</small>
								@elseif($item->menuable_type === 'custom')
									<small>@lang('admin.menu.custom_link_to', ['url' => $item->url])</small>
								@endif
							</td>
							<td class="text-right">
								{!! BootForm::open()->post()->action(route('admin.menu.move', $item)) !!}
									<button type="submit" name="direction" value="up" class="btn btn-default">⬆ <span class="sr-only">@lang('admin.common.move_up')</span></button>
									<button type="submit" name="direction" value="down" class="btn btn-default">⬇<span class="sr-only">@lang('admin.common.move_down')</span></button>
									<a href="{{ route('admin.menu.edit', $item) }}" class="btn btn-default">Edit</a>
								{!! BootForm::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<div class="panel-body">
				@include('common.alerts')
				<div class="text-center text-muted">
					<a href="{{ route('admin.menu.add') }}" class="btn btn-lg btn-primary">@lang('admin.menu.create')</a>
				</div>
			</div>
		@endif
	</div>
@endsection