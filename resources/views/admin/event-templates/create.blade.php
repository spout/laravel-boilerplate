@extends('layouts.admin')

@section('title', _i("Create event template"))

@section('content')
    @include('admin.event-templates.includes.form')
@endsection