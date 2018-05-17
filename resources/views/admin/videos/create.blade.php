@extends('layouts.admin')

@section('title', _i("Create video"))

@section('content')
    @include('admin.videos.includes.form')
@endsection