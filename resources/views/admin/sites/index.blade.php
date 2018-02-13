@extends('layouts.admin')

@section('title', _i("Sites"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.sites.create')])
    @include('includes.datatables.table')
@endsection