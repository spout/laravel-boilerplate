@extends('layouts.admin')

@section('title', __("File manager"))

@section('content')
    <iframe src="{{ url('elfinder') }}" class="elfinder"></iframe>
@endsection