@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'cols' => [
            'email' => __("Email"),
            'subject' => __("Subject"),
            'message' => __("Message"),
        ]
    ])
@endsection