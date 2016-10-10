@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'cols' => [
            'id' => __("Id"),
            'name' => __("Name"),
            'email' => __("Email"),
            'created_at' => __("Created"),
            'updated_at' => __("Updated"),
        ]
    ])
@endsection