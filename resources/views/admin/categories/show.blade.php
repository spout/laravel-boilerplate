@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'id' => _i("Id"),
            'parent_id' => _i("Parent"),
            'title' => _i("Title"),
        ]
    ])
@endsection