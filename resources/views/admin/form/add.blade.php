@extends('admin.layout', ['title' => trans('admin.form.add')])

@section('content')
	@include('admin.form.form', ['title' => trans('admin.form.add')])
@endsection