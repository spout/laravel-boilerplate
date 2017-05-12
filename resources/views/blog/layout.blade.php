@extends('layouts.app')

@section('breadcrumbs')
    @parent
    <li><a href="{{ route('blog.index') }}">{{ _i("Blog") }}</a></li>
@endsection