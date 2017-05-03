@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'id' => _i("Id"),
            'name' => _i("Name"),
            'email' => _i("Email"),
            'created_at' => _i("Created"),
            'updated_at' => _i("Updated"),
        ]
    ])
@endsection