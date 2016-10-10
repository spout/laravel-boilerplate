@extends('layouts.admin')

@section('title', __("Create user"))

@section('content')
    @include('admin.users.includes.form')
@endsection