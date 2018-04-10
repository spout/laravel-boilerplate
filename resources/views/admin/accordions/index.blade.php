@extends('layouts.admin')

@section('title', _i("Accordions"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.accordions.create')])
    @include('includes.datatables.table')
@endsection