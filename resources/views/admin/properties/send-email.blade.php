@extends('layouts.admin')

@section('title', _i("Send emails"))

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">{{ $emailTemplate->title }}</h2>
        </div>
        <div class="panel-body">
            {!! Form::open() !!}

            {!! Form::openGroup('to', _i("To")) !!}
            {!! Form::email('to', $to) !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup('subject', _i("Subject")) !!}
            {!! Form::text('subject', $subject) !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup('message', _i("Message")) !!}
            {!! Form::textarea('message', $message) !!}
            {!! Form::closeGroup() !!}

            {!! Form::submit(_i('Send'), ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection