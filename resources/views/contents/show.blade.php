@extends('contents.layout')

@section('title', $content->title)

@section('breadcrumbs')
    @parent
    <li><a href="{{ $content->absoluteUrl }}">{{ $content->title }}</a></li>
@endsection

@section('content')
    <h1>{{ $content->title }}</h1>
    <div>
        {!! $content->content !!}
    </div>
@endsection