@extends('layouts.admin')

@section('title', _i("Create gallery"))

@section('content')
    @include('admin.galleries.includes.form')
@endsection