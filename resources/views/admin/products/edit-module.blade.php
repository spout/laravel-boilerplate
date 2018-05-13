@extends('layouts.admin')

@section('title', _i("Update module"))

@section('content')
    @include('admin.products.includes.form-nav-tabs')

    {!! Form::model($object, [
        'route' => empty($object->pk) ? ['admin.products.store'] : ['admin.products.update', $object->pk],
        'method' => empty($object->pk) ? 'POST' : 'PUT'
    ]) !!}

    {!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection