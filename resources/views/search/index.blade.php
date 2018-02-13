@extends('layouts.app')

@section('title', _i("Search"))

@section('content')
    {!! Form::open(['route' => 'search.index', 'class' => 'form-inline']) !!}

    {!! Form::openGroup('location', _i("Location")) !!}
    {!! Form::select('location', []) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('arrival_date', _i("Arrival date")) !!}
    {!! Form::date('arrival_date') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('departure_date', _i("Departure date")) !!}
    {!! Form::date('departure_date') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('adults', _i("Adults")) !!}
    {!! Form::selectRange('adults', 0, 20) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('children', _i("Children")) !!}
    {!! Form::selectRange('children', 0, 20) !!}
    {!! Form::closeGroup() !!}

    {!! Form::button(_i("Search"), ['type' => 'submit', 'class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection