@extends('layouts.app')

@section('title', $content->title)

@breadcrumb(['url' => $content->absoluteUrl, 'title' => $content->title])

@section('content')
    <h1>{{ $content->title }}</h1>
    <div>
        {!! $content->content !!}
    </div>
@endsection