@extends('layouts.app')

@section('title', _i("Contact us"))

@section('breadcrumbs')
    @parent
    <li><a href="{{ route('contacts.form') }}">{{ _i("Contact us") }}</a></li>
@endsection

@section('content')
    {!! Form::open() !!}

    <div class="row">
        <div class="col-sm-6">
            {!! Form::openGroup('lastname', _i('Lastname'), ['class' => 'required']) !!}
            {!! Form::text('lastname') !!}
            {!! Form::closeGroup() !!}
        </div>
        <div class="col-sm-6">
            {!! Form::openGroup('firstname', _i('Firstname'), ['class' => 'required']) !!}
            {!! Form::text('firstname') !!}
            {!! Form::closeGroup() !!}
        </div>
        <div class="col-sm-6">
            {!! Form::openGroup('company', _i('Company')) !!}
            {!! Form::text('company') !!}
            {!! Form::closeGroup() !!}
        </div>
        <div class="col-sm-6">
            {!! Form::openGroup('function', _i('Function')) !!}
            {!! Form::text('function') !!}
            {!! Form::closeGroup() !!}
        </div>
        <div class="col-sm-6">
            {!! Form::openGroup('email', _i('Email'), ['class' => 'required']) !!}
            {!! Form::email('email') !!}
            {!! Form::closeGroup() !!}
        </div>
        <div class="col-sm-6">
            {!! Form::openGroup('phone', _i('Phone'), ['class' => 'required']) !!}
            {!! Form::text('phone') !!}
            {!! Form::closeGroup() !!}
        </div>
    </div>

    {{--{!! Form::openGroup('subject', _i('Subject')) !!}--}}
    {{--{!! Form::text('subject') !!}--}}
    {{--{!! Form::closeGroup() !!}--}}

    {!! Form::openGroup('message', _i('Message')) !!}
    {!! Form::textarea('message') !!}
    {!! Form::closeGroup() !!}

    {!! Form::submit(_i('Send'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection