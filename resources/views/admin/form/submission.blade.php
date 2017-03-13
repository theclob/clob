@extends('admin.layout', ['title' => trans('admin.form.submissions.item_title', ['form' => $form->title])])

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">@lang('admin.form.submissions.item_title', ['form' => $form->title])</h4>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>@lang('admin.form.submissions.name')</dt>
				<dd>{{ $submission->name }}</dd>

				<dt>@lang('admin.form.submissions.email')</dt>
				<dd><a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a></dd>

				<dt>@lang('admin.form.submissions.date')</dt>
				<dd>{{ $submission->created_at }}</dd>
			</dl>
			<hr>
			<dl>
				<dt>@lang('admin.form.submissions.message')</dt>
				<dd>{!! nl2br(strip_tags($submission->message)) !!}</dd>
			</dl>
		</div>
	</div>

	<a href="{{ route('admin.form.submissions', $form) }}" class="btn btn-default">@lang('admin.common.back')</a>
@endsection