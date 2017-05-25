@extends('layouts.admin')

@section('title', _i("Posts"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.menus.create')])
    @include('includes.datatables.table')
@endsection