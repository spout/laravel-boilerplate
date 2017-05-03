@extends('layouts.admin')

@section('title', _i("File manager"))

@section('content')
    <iframe src="{{ url('elfinder') }}" class="elfinder"></iframe>
@endsection