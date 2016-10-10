@extends('layouts.admin')

@section('title', __("Contents"))

@section('content')
    @include('includes.crud.index', [
        'prefix' => 'admin.contents',
        'cols' => [
            '__toString' => __("Title"),
            'slug' => __("Slug"),
            'actions' => __("Actions"),
        ],
    ])
@endsection