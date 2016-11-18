@extends('layouts.admin')

@section('title', __("Posts"))

@section('content')
    @include('includes.crud.index', [
        'cols' => [
            '__toString' => __("Title"),
            //'content' => __("Content"),
            'actions' => __("Actions"),
        ],
    ])
@endsection