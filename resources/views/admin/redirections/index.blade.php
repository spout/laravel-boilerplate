@extends('layouts.admin')

@section('title', _i("Redirections"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.redirections.create')])
    @include('includes.datatables.table')
@endsection