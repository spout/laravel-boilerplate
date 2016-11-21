@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'id' => __("Id"),
            'parent_id' => __("Parent"),
            'title' => __("Title"),
        ]
    ])
@endsection