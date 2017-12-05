@extends('layouts.app')

@section('title', _i("After-sales service"))

@section('content')
    <div class="container">
        <h1>{{ _i("After-sales service form") }}</h1>

        {!! Form::open(['route' => 'after-sales-services.store', 'files' => true, 'novalidate']) !!}

        @include('includes.after-sales-services.form')

        {!! Form::submit(_i('Send'), ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@endsection