@extends('auth.layout')

@section('title', _i("Register"))

@section('content')
    <div class="card">
        <div class="card-header">{{ _i("Register") }}</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    {!! Form::open(['route' => 'register']) !!}

                    {!! Form::openGroup('name', _i("Name")) !!}
                    {!! Form::text('name') !!}
                    {!! Form::closeGroup() !!}

                    {!! Form::openGroup('email', _i("Email")) !!}
                    {!! Form::email('email') !!}
                    {!! Form::closeGroup() !!}

                    {!! Form::openGroup('password', _i("Password")) !!}
                    {!! Form::password('password') !!}
                    {!! Form::closeGroup() !!}

                    {!! Form::openGroup('password_confirmation', _i("Confirm password")) !!}
                    {!! Form::password('password_confirmation') !!}
                    {!! Form::closeGroup() !!}

                    {!! Form::button(_i("Register"), ['type' => 'submit', 'class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
                <div class="col">
                    @include('auth.includes.providers', ['action' => 'register'])
                </div>
            </div>
        </div>
    </div>
@endsection
