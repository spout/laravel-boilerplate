@extends('auth.layout')

@section('title', _i("Reset password"))

@section('content')
    <div class="card">
        <div class="card-header">{{ _i("Reset password") }}</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['route' => 'password.request']) !!}

            {!! Form::openGroup('email', _i("Email")) !!}
            {!! Form::email('email') !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup('password', _i("Password")) !!}
            {!! Form::password('password') !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup('password_confirmation', _i("Confirm password")) !!}
            {!! Form::password('password_confirmation') !!}
            {!! Form::closeGroup() !!}

            {!! Form::button(_i("Reset password"), ['type' => 'submit', 'class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
