@extends('contents.layout')

@section('title', $content->title)

@section('breadcrumbs')
    @parent
    @if ($content->ancestors->count())
        @foreach ($content->ancestors as $ancestor)
            <li><a href="{{ $ancestor->absoluteUrl }}">{{ $ancestor->title }}</a></li>
        @endforeach
    @endif
    <li><a href="{{ $content->absoluteUrl }}">{{ $content->title }}</a></li>
@endsection

@section('content')
    {{--<h1>{{ $content->title }}</h1>--}}
    <div>
        {!! $content->content !!}
    </div>
@endsection