@extends('layouts.admin')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'columns' => [
            'id' => _i("Id"),
            'to' => _i("To"),
            'subject' => _i("Subject"),
            'message' => _i("Message"),
            'created_at' => _i("Created"),
            'updated_at' => _i("Updated"),
        ]
    ])
@endsection