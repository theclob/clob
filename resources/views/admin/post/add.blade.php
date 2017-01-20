@extends('admin.layout', ['title' => trans('admin.post.add')])

@section('content')
	@include('admin.post.form', ['title' => trans('admin.post.add')])
@endsection