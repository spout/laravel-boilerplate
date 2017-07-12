@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'id' => _i("Id"),
            'name' => _i("Name"),
            'slug' => _i("Slug"),
            'content' => _i("Content"),
        ]
    ])
@endsection