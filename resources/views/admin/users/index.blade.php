@extends('layouts.admin')

@section('title', __("Users"))

@section('content')
    @include('includes.datatables.table', [
        'columns' => [
            'username' => __("Username"),
            'email' => __("Email"),
            'created_at' => __("Created"),
            'updated_at' => __("Updated"),
            'actions' => __("Actions"),
        ],
        'ajax' => route('admin.users.datatables'),
    ])
@endsection