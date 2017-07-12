@extends('layouts.admin')

@section('title', _i("Snippets"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.snippets.create')])
    @include('includes.datatables.table')
@endsection