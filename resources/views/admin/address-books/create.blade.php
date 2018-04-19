@extends('layouts.admin')

@section('title', _i("Create address book"))

@section('content')
    @include('admin.address-books.includes.form')
@endsection