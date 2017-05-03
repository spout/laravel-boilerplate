@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'email' => _i("Email"),
            'subject' => _i("Subject"),
            'message' => _i("Message"),
        ]
    ])
@endsection