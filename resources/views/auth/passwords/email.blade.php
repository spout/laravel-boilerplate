@extends('auth.layout')

@section('content')
    <div class="card">
        <div class="card-header">{{ _i("Reset password") }}</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['route' => 'password.email']) !!}

            {!! Form::openGroup('email', _i("Email")) !!}
            {!! Form::email('email') !!}
            {!! Form::closeGroup() !!}

            {!! Form::button(_i("Send password reset link"), ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
