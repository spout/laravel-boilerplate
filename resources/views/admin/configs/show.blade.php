@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'key' => __("Key"),
            'value' => __("Value"),
        ]
    ])
@endsection