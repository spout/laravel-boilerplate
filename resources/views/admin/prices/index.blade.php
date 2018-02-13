@extends('layouts.admin')

@section('title', _i("Prices"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.prices.create')])
    @include('includes.datatables.table')
@endsection