@extends('layouts.admin')

@section('title', _i("Create newsletter"))

@section('content')
    @include('admin.newsletters.includes.form')
@endsection