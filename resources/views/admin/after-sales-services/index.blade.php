@extends('layouts.admin')

@section('title', _i("After-sales services"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.after-sales-services.create')])
    @include('includes.datatables.table')
@endsection