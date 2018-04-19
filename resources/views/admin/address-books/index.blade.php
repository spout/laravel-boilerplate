@extends('layouts.admin')

@section('title', _i("Address books"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.address-books.create')])
    @include('includes.datatables.table')
@endsection