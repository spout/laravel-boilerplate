@extends('layouts.admin')

@section('title', _i("Update newsletter email"))

@section('content')
    @include('admin.newsletter-emails.includes.form')
@endsection