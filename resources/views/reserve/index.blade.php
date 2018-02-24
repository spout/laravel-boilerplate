@extends('layouts.app')

@section('title', _i("Reserve"))

@section('content')
    {!! Form::open(['route' => 'reserve.index' /*, 'class' => 'form-inline'*/]) !!}

    {!! Form::openGroup('category_id', _i("Category")) !!}
    {!! Form::select('category_id', $categoryList) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('business_id', _i("Business")) !!}
    {!! Form::select('business_id', []) !!}
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