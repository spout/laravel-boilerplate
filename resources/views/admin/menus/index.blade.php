@extends('layouts.admin')

@section('title', __("Posts"))

@section('content')
    @include('includes.datatables.table', [
        'columns' => [
            'title' => __("Title"),
            'slug' => __("Slug"),
            'actions' => __("Actions"),
        ],
        'ajax' => route('admin.menus.datatables'),
    ])
@endsection