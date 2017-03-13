@extends('admin.layout', ['title' => trans('admin.form.manage')])

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">@lang('admin.form.manage')</h4>
		</div>
		@if($forms->count() > 0)
			<div class="panel-body">
				@include('common.alerts')
				<a href="{{ route('admin.form.add') }}" class="btn btn-primary">@lang('admin.form.add')</a>
			</div>
			<table class="table">
				<colgroup>
					<col />
					<col style="width: 140px" />
				</colgroup>
				<thead>
					<tr>
						<th>@lang('admin.form.title')</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($forms as $form)
						<tr>
							<td><a href="{{ route('admin.form.edit', $form) }}">{{ $form->title }}</a></td>
							<td class="text-right">
								<a href="{{ route('admin.form.submissions', $form) }}" class="btn btn-default btn-xs">@lang('admin.form.submissions.button')</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@if($forms->lastPage() > 1)
				<div class="panel-body text-center">{{ $forms->links() }}</div>
			@endif
		@else
			<div class="panel-body">
				@include('common.alerts')
				<div class="text-center text-muted">
					<a href="{{ route('admin.form.add') }}" class="btn btn-lg btn-primary">@lang('admin.form.create')</a>
				</div>
			</div>
		@endif
	</div>
@endsection