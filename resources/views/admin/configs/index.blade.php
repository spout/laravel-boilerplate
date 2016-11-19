@extends('layouts.admin')

@section('title', __("Configs"))

@section('content')
    @include('includes.datatables.table', [
        'columns' => [
            'key' => __("Id"),
            'actions' => __("Actions"),
        ],
        'ajax' => route('admin.configs.datatables'),
    ])
@endsection