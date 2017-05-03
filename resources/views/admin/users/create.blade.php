@extends('layouts.admin')

@section('title', _i("Create user"))

@section('content')
    @include('admin.users.includes.form')
@endsection