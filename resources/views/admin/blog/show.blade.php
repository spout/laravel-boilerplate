@extends('layouts.app')

@section('title', $object)

@section('content')
    @include('includes.crud.show', [
        'cols' => [
            'id' => trans("Id"),
            'title' => trans("Title"),
            'content' => trans("Content"),
            'created_at' => trans("Created"),
            'updated_at' => trans("Updated"),
        ]
    ])
@endsection