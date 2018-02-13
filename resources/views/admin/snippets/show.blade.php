@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'slug' => _i("Slug"),
            'title' => _i("Title"),
            'content' => _i("Content"),
        ]
    ])
@endsection