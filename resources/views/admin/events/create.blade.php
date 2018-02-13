@extends('layouts.admin')

@section('title', _i("Create event"))

@section('content')
    @include('admin.events.includes.form')
@endsection