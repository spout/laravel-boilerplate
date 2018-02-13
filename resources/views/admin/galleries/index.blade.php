@extends('layouts.admin')

@section('title', _i("Galleries"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.galleries.create')])
    @include('includes.datatables.table')
@endsection