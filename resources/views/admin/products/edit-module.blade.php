@extends('layouts.admin')

@section('title', _i("Update module"))

@section('content')
    @include('admin.products.includes.form-nav-tabs')

    {!! Form::model($moduleModelInstance, [
        'route' => ['admin.products.edit-module', $object->pk, $placeholder->id],
        'method' => empty($object->pk) ? 'POST' : 'PUT'
    ]) !!}

    {!! Form::hidden('product_id', $object->pk) !!}
    {!! Form::hidden('placeholder_id', $placeholder->id) !!}

    @include("includes.modules.forms.{$placeholder->module_slug}")

    {!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection