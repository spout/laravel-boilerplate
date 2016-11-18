@extends('layouts.admin')

@section('title', __("Create category"))

@section('content')
    @include('admin.categories.includes.form')
@endsection