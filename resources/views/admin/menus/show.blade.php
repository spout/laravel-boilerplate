@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'cols' => [
            'id' => __("Id"),
            'title' => __("Title"),
        ]
    ])
@endsection