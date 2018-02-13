@extends('auth.layout')

@section('title', _i("Login"))

@section('content')
    <div class="card">
        <div class="card-header">{{ _i("Login") }}</div>
        <div class="card-body">
            {!! Form::open(['route' => 'login']) !!}

            {!! Form::openGroup('email', _i("Email")) !!}
            {!! Form::email('email') !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup('password', _i("Password")) !!}
            {!! Form::password('password') !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup('remember', _i("Remember me")) !!}
            {!! Form::checkbox('remember') !!}
            {!! Form::closeGroup() !!}

            {!! Form::button(_i("Login"), ['type' => 'submit', 'class' => 'btn btn-primary']) !!}

            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ _i("Forgot your password?") }}
            </a>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
