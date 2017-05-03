@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'key' => _i("Key"),
            'value' => _i("Value"),
        ]
    ])
@endsection