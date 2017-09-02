@extends('layouts.admin')

@section('title', $object)

@section('content')
    <?php
    $columns = [
        'id' => _i("ID"),
//        'email_type_id' => _i("Email type"),
        'title' => _i("Title"),
        'subject' => _i("Subject"),
        'template' => _i("Template"),
    ];
    ?>

    <dl class="dl-horizontal">
        @foreach ($columns as $column => $label)
            <dt>{{ $label }}</dt>
            <dd>{{ $object->{$column} }}</dd>
        @endforeach
    </dl>
@endsection