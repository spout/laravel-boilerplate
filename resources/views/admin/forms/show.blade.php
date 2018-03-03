@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'id' => _i("Id"),
            'title' => _i("Title"),
            'shortcode' => _i("Shortcode"),
        ]
    ])
@endsection