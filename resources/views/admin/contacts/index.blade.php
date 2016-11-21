@extends('layouts.admin')

@section('title', __("Contacts"))

@section('content')
    @include('includes.datatables.table', [
        'columns' => [
            'email' => __("Email"),
            'subject' => __("Subject"),
            'actions' => __("Actions"),
        ],
        'ajax' => route('admin.contacts.datatables'),
    ])
@endsection