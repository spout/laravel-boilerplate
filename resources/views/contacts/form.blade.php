@extends('layouts.app')

@section('title', _i("Contact us"))

@section('breadcrumbs')
    @parent
    <li><a href="{{ route('contacts.form') }}">{{ _i("Contact us") }}</a></li>
@endsection

@section('content')
    <div class="container">
        @include('contacts.includes.form')
    </div>
@endsection