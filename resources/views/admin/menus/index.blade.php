@extends('layouts.admin')

@section('title', __("Posts"))

@section('content')
    @include('includes.crud.index', [
        'prefix' => 'admin.menus',
        'cols' => [
            '__toString' => __("Title"),
            'slug' => __("Slug"),
            'items' => __("Items"),
            'actions' => __("Actions"),
        ],
    ])
@endsection