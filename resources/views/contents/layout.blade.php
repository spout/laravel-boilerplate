@extends('layouts.app')

@section('content')
    @if ($content->path !== 'homepage')
        <div class="container">
            @yield('content')
        </div>
    @else
        @yield('content')
    @endif
@overwrite