@extends('layouts.admin')

@section('title', _i("Create email template"))

@section('content')
    @include('admin.email-templates.includes.form')
@endsection