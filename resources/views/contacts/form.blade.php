@extends('layouts.app')

@section('title', _i("Contact us"))

@section('breadcrumbs')
    @parent
    <li><a href="{{ route('contacts.form') }}">{{ _i("Contact us") }}</a></li>
@endsection

@section('content')
    {!! Form::open() !!}

    {!! Form::openGroup('company', _i('Company')) !!}
    {!! Form::text('company') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('firstname', _i('Firstname')) !!}
    {!! Form::text('firstname') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('lastname', _i('Lastname')) !!}
    {!! Form::text('lastname') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('phone', _i('Phone')) !!}
    {!! Form::text('phone') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('email', _i('Email')) !!}
    {!! Form::email('email') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('subject', _i('Subject')) !!}
    {!! Form::text('subject') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('message', _i('Message')) !!}
    {!! Form::textarea('message') !!}
    {!! Form::closeGroup() !!}

    {!! Form::submit(_i('Send'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection