@extends('layouts.admin')

@section('title', _i("Contents"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.contents.create')])
    @include('includes.datatables.table', [
        'bulkActions' => [
            'active' => _i("Make active"),
        ],
    ])
@endsection