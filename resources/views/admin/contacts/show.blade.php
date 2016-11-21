@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'email' => __("Email"),
            'subject' => __("Subject"),
            'message' => __("Message"),
        ]
    ])
@endsection