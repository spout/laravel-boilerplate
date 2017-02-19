@extends('layouts.admin')

@section('title', __("Posts"))

@section('content')
    @include('includes.datatables.table')
@endsection