@extends('layouts.admin')

@section('title', __("Configs"))

@section('content')
    @include('includes.crud.index', [
        'cols' => [
            'key' => __("Key"),
            'actions' => __("Actions"),
        ],
    ])
@endsection