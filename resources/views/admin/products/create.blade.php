@extends('layouts.admin')

@section('title', _i("Create product"))

@section('content')
    @include('admin.products.includes.form')
@endsection