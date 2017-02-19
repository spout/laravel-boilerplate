@extends('layouts.admin')

@section('title', __("Contents"))

@section('content')
    @include('includes.datatables.table', [
        'bulkActions' => [
            'active' => __("Make active"),
        ],
    ])
@endsection