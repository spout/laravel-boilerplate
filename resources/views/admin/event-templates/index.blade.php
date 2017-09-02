@extends('layouts.admin')

@section('title', _i("Email templates"))

@section('content')
    {{--@include('includes.admin.create-button', ['url' => route('admin.event-templates.create')])--}}
    @include('includes.datatables.table')
@endsection