@extends('layouts.app')

@section('title', __("Blog"))

@section('content')
    @if ($posts)
        <div class="panel-group">
            @foreach($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ $post->absoluteUrl }}">{{ $post->title }}</a>
                    </div>
                    <div class="panel-body">
                        {{ $post->content }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection