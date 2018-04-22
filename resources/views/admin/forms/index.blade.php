@extends('layouts.admin')

@section('title', _i("Forms"))

@section('content')
    @include('includes.admin.create-button')
    @include('includes.datatables.table')
@endsection