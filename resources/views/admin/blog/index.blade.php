@extends('layouts.app')

@section('title', trans("Posts"))

@section('content')
    @include('includes.crud.index', [
        'prefix' => 'admin.blog',
        'cols' => [
            '__toString' => trans("Title"),
            //'content' => trans("Content"),
            'actions' => trans("Actions"),
        ],
    ])
@endsection