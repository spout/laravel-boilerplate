@extends('layouts.app')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'cols' => [
            'id' => __("Id"),
            'title' => __("Title"),
            'content' => __("Content"),
            'created_at' => __("Created"),
            'updated_at' => __("Updated"),
        ]
    ])
@endsection