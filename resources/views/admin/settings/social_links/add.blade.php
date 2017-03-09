@extends('admin.layout', ['title' => trans('admin.settings.social_links.add')])

@section('content')
	@include('admin.settings.social_links.form', ['title' => trans('admin.settings.social_links.add')])
@endsection