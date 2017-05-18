@extends('contents.layout')

@section('title', $content->title)

@section('breadcrumbs')
    @parent
    @if (!empty($content->parentRecursive))
        @foreach ($content->parentRecursive->all() as $parent)
            <li><a href="{{ $parent->absoluteUrl }}">{{ $parent->title }}</a></li>
        @endforeach
    @else
        <li><a href="{{ $content->absoluteUrl }}">{{ $content->title }}</a></li>
    @endif
@endsection

@section('content')
    <h1>{{ $content->title }}</h1>
    <div>
        {!! $content->content !!}
    </div>
@endsection