@extends('layouts.admin')

@section('title', _i("Users"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.users.create')])
    @include('includes.datatables.table')
@endsection