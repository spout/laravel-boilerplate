@extends('layouts.admin')

@section('title', _i("Create booking"))

@section('content')
    @include('admin.bookings.includes.form')
@endsection