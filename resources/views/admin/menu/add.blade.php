@extends('admin.layout', ['title' => trans('admin.menu.add')])

@section('content')
	@include('admin.menu.form', ['title' => trans('admin.menu.add')])
@endsection