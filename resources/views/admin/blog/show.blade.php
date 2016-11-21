@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'id' => __("Id"),
            'title' => __("Title"),
            'content' => __("Content"),
            'created_at' => __("Created"),
            'updated_at' => __("Updated"),
        ]
    ])
@endsection