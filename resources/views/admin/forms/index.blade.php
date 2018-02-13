@extends('layouts.admin')

@section('title', _i("Forms"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.forms.create')])
    @include('includes.datatables.table')
@endsection