@extends('admin.layout', ['title' => trans('admin.page.add')])

@section('content')
	@include('admin.page.form', ['title' => trans('admin.page.add')])
@endsection