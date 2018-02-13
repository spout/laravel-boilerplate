@extends('layouts.admin')

@section('title', _i("Events"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.events.create')])
    @include('includes.datatables.table')
@endsection