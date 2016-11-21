@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'id' => __("Id"),
            'title' => __("Title"),
        ]
    ])
@endsection