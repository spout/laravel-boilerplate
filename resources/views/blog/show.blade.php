@extends('blog.layout')

@section('title', $post->title)

@section('breadcrumbs')
    @parent
    <li><a href="{{ $post->absoluteUrl }}">{{ $post->title }}</a></li>
@endsection

@section('content')
    <h1>{{ $post->title }}</h1>
    <div>{!! $post->content !!}</div>
@endsection