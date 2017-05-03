@extends('layouts.admin')

@section('title', _i("Posts"))

@section('content')
    @include('includes.datatables.table')
@endsection