@extends('layouts.admin')

@section('title', _i("Newsletter emails"))

@section('content')
    @include('includes.admin.create-button')
    @include('includes.datatables.table')
@endsection