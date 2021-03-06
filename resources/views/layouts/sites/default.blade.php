<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" class="{{ str_replace('.', ' ', Route::current()->getName()) }}" data-environment="{{ App::environment() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @stack('styles')
    <link href="{{ asset('build/app.css') }}" rel="stylesheet">
    @if (file_exists(public_path('css/custom.css')))
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @endif

    <link rel="manifest" href="{{ asset('manifest.json') }}">
    @stack('head')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <a class="navbar-brand" href="{{ route('homepage') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01">
        <span class="navbar-toggler-icon"></span>
        {{ _i("Menu") }}
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        @tree(['tree' => $menuPrincipal, 'params' => ['view' => 'menus.mega', 'attributes' => ['class' => 'nav navbar-nav']]])
    </div>
</nav>
<div class="container-fluid">
    @renderBreadcrumbs()
    @include('flash::message')
    @include('includes.validation-errors')
    <div id="content">
        @yield('content')
    </div>
    <footer>
        @menu(['slug' => 'footer'])
        @snippet(['slug' => 'footer-copyright'])
    </footer>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}"></script>
<script src="{{ asset('build/app.js') }}"></script>
@include('includes.scripts')
@stack('scripts')
</body>
</html>