@extends('admin.layout', ['title' => "Edit Post $post->id"])

@section('content')
	@include('admin.post.form', ['title' => "Edit Post $post->id"])
@endsection