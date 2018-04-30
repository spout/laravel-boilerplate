@extends('layouts.admin')

@section('title', _i("Update newsletter"))

@section('content')
    @include('admin.newsletters.includes.form')
@endsection