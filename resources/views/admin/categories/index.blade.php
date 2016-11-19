@extends('layouts.admin')

@section('title', __("Categories"))

@section('content')
    @include('includes.datatables.table', [
        'columns' => [
            'title' => __("Title"),
            'actions' => __("Actions"),
        ],
        'ajax' => route('admin.categories.datatables'),
    ])
@endsection