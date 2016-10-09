@extends('pages.layouts.app')

@section('title', ucfirst($slug))

@section('content')
    <h1>{{ ucfirst($slug) }}</h1>
@endsection