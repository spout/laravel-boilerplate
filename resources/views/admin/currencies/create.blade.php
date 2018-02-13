@extends('layouts.admin')

@section('title', _i("Create currency"))

@section('content')
    @include('admin.currencies.includes.form')
@endsection