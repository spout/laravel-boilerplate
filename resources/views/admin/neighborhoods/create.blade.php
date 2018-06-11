@extends('layouts.admin')

@section('title', _i("Create neighborhood"))

@section('content')
    @include('admin.neighborhoods.includes.form')
@endsection