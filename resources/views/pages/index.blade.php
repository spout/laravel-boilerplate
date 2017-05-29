@extends('pages.layout')

@section('title', ucfirst($path))

@section('content')
    <h1>{{ ucfirst($path) }}</h1>
@endsection