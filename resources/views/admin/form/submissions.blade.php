@extends('admin.layout', ['title' => trans('admin.form.submissions.title', ['form' => $form->title])])

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">@lang('admin.form.submissions.title', ['form' => $form->title])</h4>
		</div>
		@if($submissions->count() > 0)
			<table class="table">
				<colgroup>
					<col />
					<col />
					<col style="width: 220px" />
					<col style="width: 90px" />
				</colgroup>
				<thead>
					<tr>
						<th>@lang('admin.form.submissions.name')</th>
						<th>@lang('admin.form.submissions.email')</th>
						<th>@lang('admin.form.submissions.date')</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($submissions as $submission)
						<tr>
							<td>{{ $submission->name }}</td>
							<td><a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a></td>
							<td>{{ $submission->created_at }}</td>
							<td class="text-right">
								<a href="{{ route('admin.form.submission', [$form, $submission]) }}" class="btn btn-default btn-xs">@lang('admin.common.view')</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@if($submissions->lastPage() > 1)
				<div class="panel-body text-center">{{ $form->submissions->links() }}</div>
			@endif
		@else
			<div class="panel-body">
				@lang('admin.form.submissions.empty')
			</div>
		@endif
	</div>

	<a href="{{ route('admin.form.index') }}" class="btn btn-default">@lang('admin.common.back')</a>
@endsection