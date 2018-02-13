@extends('layouts.admin')

@section('title', _i("Products"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.products.create')])
    @include('includes.datatables.table')
@endsection