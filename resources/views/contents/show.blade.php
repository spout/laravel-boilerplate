@extends('contents.layout')

@section('title', $content->title)

@section('breadcrumbs')
    @parent
    @if ($content->ancestors->count())
        @foreach ($content->ancestors as $ancestor)
            <li><a href="{{ $ancestor->absoluteUrl }}">{{ $ancestor->title }}</a></li>
        @endforeach
    @endif
    <li class="active">{{ $content->title }}</li>
@endsection

@section('content')
    <div id="content-{{ str_replace('/', '-', $content->path) }}">
        @if (Auth::check() && Auth::user()->is_admin)
            <div class="text-right"><a href="{{ route('admin.contents.edit', [$content->pk]) }}" class="btn btn-default btn-xs" title="{{ _i("Edit content") }}" data-edit-target="#content-{{ str_replace('/', '-', $content->path) }}">{{ _i("Edit") }}</a></div>
        @endif
        {!! Shortcode::compile($content->content) !!}
    </div>
@endsection