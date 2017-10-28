@extends('layouts.admin')

@section('title', _i("Contacts"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.contacts.create')])
    @include('includes.datatables.table')
@endsection