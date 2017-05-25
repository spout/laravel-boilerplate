@extends('layouts.admin')

@section('title', _i("Categories"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.categories.create')])
    @include('includes.datatables.table')
@endsection