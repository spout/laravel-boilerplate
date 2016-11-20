@extends('layouts.admin')

@section('title', __("Configs"))

@section('content')
    @include('includes.datatables.table', [
        'columns' => [
            'key' => __("Key"),
            'actions' => __("Actions"),
        ],
        'ajax' => route('admin.configs.datatables'),
    ])
@endsection