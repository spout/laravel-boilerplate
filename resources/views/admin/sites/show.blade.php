@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'slug' => _i("Slug"),
            'domain' => _i("Domain"),
            'name' => _i("Name"),
        ]
    ])
@endsection