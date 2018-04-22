@extends('layouts.admin')

@section('title', _i("Address books"))

@section('content')
    @include('includes.admin.create-button')
    @include('includes.datatables.table')
@endsection