@extends('layouts.admin')

@section('title', _i("Create newsletter email"))

@section('content')
    @include('admin.newsletter-emails.includes.form')
@endsection