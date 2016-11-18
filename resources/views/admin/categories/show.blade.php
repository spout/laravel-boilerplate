@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'cols' => [
            'id' => __("Id"),
            'parent_id' => __("Parent"),
            'title' => __("Title"),
        ]
    ])
@endsection