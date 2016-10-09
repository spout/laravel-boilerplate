@extends('layouts.admin')

@section('title', __("Configs"))

@section('content')
    @include('includes.crud.index', [
        'prefix' => 'admin.configs',
        'cols' => [
            'key' => __("Key"),
            'actions' => __("Actions"),
        ],
    ])
@endsection