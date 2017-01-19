@extends('admin.layout', ['title' => "Add New Post"])

@section('content')
	@include('admin.post.form', ['title' => "Add New Post"])
@endsection