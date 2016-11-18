@extends('layouts.admin')

@section('title', __("Categories"))

@section('content')
    @include('includes.crud.index', [
        'cols' => [
            'title' => __("Name"),
            'actions' => __("Actions"),
        ],
    ])
@endsection