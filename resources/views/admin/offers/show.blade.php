@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'id' => _i("Id"),
            'title' => _i("Title"),
            'description' => _i("Description"),
            'created_at' => _i("Created"),
            'updated_at' => _i("Updated"),
        ]
    ])
@endsection