@extends('layouts.app')

@section('title', _i("Customer files"))

@section('content')
    <h1>{{ _i("Customer files") }}</h1>

    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>{{ _i("Filename") }}</th>
                <th>{{ _i("Changed") }}</th>
                <th>{{ _i("Size") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
                <tr>
                    <td>
                        <a href="{{ route('customers.files', ['file' => basename($file)]) }}">{{ basename($file) }}</a>
                    </td>
                    <td>
                        {{ \Carbon\Carbon::createFromTimestamp(filemtime($file))->format('d/m/Y H:i:s') }}
                    </td>
                    <td>
                        {{ human_filesize(filesize($file)) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection