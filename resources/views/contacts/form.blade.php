@extends('layouts.app')

@section('title', _i("Contact us"))

@section('content')
    {!! Form::open() !!}

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