@extends('layouts.admin')

@section('title', _i("Properties"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.properties.create')])
    @include('includes.datatables.table')
@endsection