@extends('layouts.admin')

@section('title', _i("Emails"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.emails.create')])
    @include('includes.datatables.table')
@endsection