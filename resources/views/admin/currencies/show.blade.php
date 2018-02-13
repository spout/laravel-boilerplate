@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'code' => _i("Code"),
            'name' => _i("Name"),
            'symbol' => _i("Symbol"),
        ]
    ])
@endsection