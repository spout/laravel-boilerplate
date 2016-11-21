@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'id' => __("Id"),
            'name' => __("Name"),
            'email' => __("Email"),
            'created_at' => __("Created"),
            'updated_at' => __("Updated"),
        ]
    ])
@endsection