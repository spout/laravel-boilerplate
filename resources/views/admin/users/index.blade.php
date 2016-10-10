@extends('layouts.admin')

@section('title', __("Users"))

@section('content')
    @include('includes.crud.index', [
        'prefix' => 'admin.users',
        'cols' => [
            'name' => __("Name"),
            'email' => __("Email"),
            'actions' => __("Actions"),
        ],
    ])
@endsection