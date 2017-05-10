@extends('layouts.app')

@section('title', $content->title)

@if (!empty($content->parentRecursive))
    @foreach ($content->parentRecursive->all() as $parent)
        @breadcrumb(['url' => $parent->absoluteUrl, 'title' => $parent->title])
    @endforeach
@else
    @breadcrumb(['url' => $content->absoluteUrl, 'title' => $content->title])
@endif

@section('content')
    <h1>{{ $content->title }}</h1>
    <div>
        {!! $content->content !!}
    </div>
@endsection