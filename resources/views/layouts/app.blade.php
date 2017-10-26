<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @stack('styles')
    <link href="{{ asset('build/app.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="manifest" href="{{ asset('manifest.json') }}">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('homepage') }}">{{ config('app.name') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            {{--@menu(['slug' => 'principal'])--}}
            @tree(['tree' => $menuPrincipal, 'params' => ['view' => 'tree.navbar.display', 'attributes' => ['class' => 'nav navbar-nav']]])

            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--@if (Auth::check())--}}
                    {{--<li class="navbar-text">{{ Auth::user()->name }}</li>--}}
                    {{--<li>--}}
                        {{--<a href="#" onclick="document.logout.submit();return false;"><i class="fa fa-sign-out"></i> {{ _i("Logout") }}</a>--}}
                        {{--{{ Form::open(['route' => 'logout', 'method' => 'post', 'name' => 'logout']) }}--}}
                        {{--{{ Form::close() }}--}}
                    {{--</li>--}}
                {{--@else--}}
                    {{--<li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> {{ _i("Login") }}</a></li>--}}
                {{--@endif--}}
            {{--</ul>--}}
        </div>
    </div>
</nav>
<div class="container">
    @if (Route::current()->getName() !== 'homepage')
        @hasSection('breadcrumbs')
            <ul class="breadcrumb">
                <li><a href="{{ route('homepage') }}">{{ config('app.name') }}</a></li>
                @yield('breadcrumbs')
            </ul>
        @endif
    @endif
    @include('flash::message')
    @include('includes.validation-errors')
    @yield('content')
    <footer>
        <hr>
        @snippet(['slug' => 'partners'])
        <hr>
        <div class="row">
            <div class="col-sm-3">
                @snippet(['slug' => 'footer-products'])
            </div>
            <div class="col-sm-6">
                @snippet(['slug' => 'footer-about'])
            </div>
            <div class="col-sm-3">
                @snippet(['slug' => 'footer-address'])
            </div>
        </div>
    </footer>
</div>
<script src="{{ asset('build/app.js') }}"></script>
@include('includes.scripts.global')
@include('includes.scripts.i18n')
@stack('scripts')
</body>
</html>