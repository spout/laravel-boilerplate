@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'id' => _i("Id"),
            'domain' => _i("Domain"),
            'url' => _i("URL"),
            'destination' => _i("Destination"),
        ]
    ])
@endsection