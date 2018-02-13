@extends('layouts.admin')

@section('title', _i("Offers"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.offers.create')])
    @include('includes.datatables.table')
@endsection