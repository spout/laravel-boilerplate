@extends('layouts.admin')

@section('title', _i("Create category"))

@section('content')
    @include('admin.categories.includes.form')
@endsection