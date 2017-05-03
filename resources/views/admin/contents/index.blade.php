@extends('layouts.admin')

@section('title', _i("Contents"))

@section('content')
    @include('includes.datatables.table', [
        'bulkActions' => [
            'active' => _i("Make active"),
        ],
    ])
@endsection