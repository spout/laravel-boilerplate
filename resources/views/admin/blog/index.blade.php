@extends('layouts.app')

@section('title', __("Posts"))

@section('content')
    @include('includes.crud.index', [
        'prefix' => 'admin.blog',
        'cols' => [
            '__toString' => __("Title"),
            //'content' => __("Content"),
            'actions' => __("Actions"),
        ],
    ])
@endsection