@extends('layouts.admin')

@section('title', __("Contents"))

@section('content')
    @include('includes.datatables.table', [
        'columns' => [
            'id' => __("Id"),
            'title' => __("Title"),
            'slug' => __("Slug"),
            'path' => __("Path"),
            'created_at' => __("Created"),
            'updated_at' => __("Updated"),
            'actions' => __("Actions"),
        ],
        'ajax' => route('admin.contents.datatables'),
    ])
@endsection