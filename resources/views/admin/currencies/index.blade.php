@extends('layouts.admin')

@section('title', _i("Currencies"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.currencies.create')])
    @include('includes.datatables.table')
@endsection