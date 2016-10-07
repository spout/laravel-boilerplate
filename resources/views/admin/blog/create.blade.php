@extends('layouts.app')

@section('title', trans("Create post"))

@section('content')
    @include('admin.blog.form')
@endsection