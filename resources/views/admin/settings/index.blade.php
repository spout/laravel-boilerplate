@extends('layouts.admin')

@section('title', _i("Settings"))

@section('content')
    @include('includes.admin.create-button', ['url' => route('admin.settings.create')])
    @include('includes.datatables.table')
@endsection