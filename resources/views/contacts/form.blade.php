@extends('layouts.app')

@section('title', __("Contact us"))

@section('content')
    {!! Form::open() !!}

    {!! Form::openGroup('email', __('Email')) !!}
    {!! Form::email('email') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('subject', __('Subject')) !!}
    {!! Form::text('subject') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('message', __('Message')) !!}
    {!! Form::textarea('message') !!}
    {!! Form::closeGroup() !!}

    {!! Form::submit(__('Send'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection