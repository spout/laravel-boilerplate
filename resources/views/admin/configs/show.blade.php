@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'cols' => [
            'key' => __("Key"),
            'value' => __("Value"),
        ]
    ])
@endsection