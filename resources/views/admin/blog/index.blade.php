@extends('layouts.admin')

@section('title', __("Posts"))

@section('content')
    @include('includes.datatables.table', [
        'columns' => [
            'title' => __("Title"),
            'slug' => __("Slug"),
            'created_at' => __("Created"),
            'updated_at' => __("Updated"),
            'actions' => __("Actions"),
        ],
        'ajax' => route('admin.blog.datatables'),
    ])
@endsection