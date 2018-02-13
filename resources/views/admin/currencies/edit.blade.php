@extends('layouts.admin')

@section('title', _i("Update currency"))

@section('content')
    @include('admin.currencies.includes.form')
@endsection