<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') :: {{ _i("Administration") }}</title>

    @stack('styles')
    <link href="{{ asset('build/admin.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">{{ _i("Administration") }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (Auth::check())
            <div class="collapse navbar-collapse justify-content-end" id="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="navbar-text">{{ Auth::user()->name }}</li>
                    <li class="nav-item">
                        <a href="#" onclick="document.logout.submit();return false;" class="nav-link"><i class="fa fa-sign-out"></i> {{ _i("Logout") }}</a>
                        {{ Form::open(['route' => 'logout', 'method' => 'post', 'name' => 'logout']) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <?php
            $navs = [
                _i("Sites") => 'admin.sites',
                _i("Categories") => 'admin.categories',
                _i("Contents") => 'admin.contents',
                _i("Products") => 'admin.products',
                _i("Prices") => 'admin.prices',
                _i("Offers") => 'admin.offers',
                _i("Events") => 'admin.events',
                _i("Snippets") => 'admin.snippets',
                _i("Blog") => 'admin.blog',
                _i("Galleries") => 'admin.galleries',
                _i("Accordions") => 'admin.accordions',
                _i("Menus") => 'admin.menus',
                _i("Users") => 'admin.users',
                _i("Forms") => 'admin.forms',
                _i("Contacts") => 'admin.contacts',
                _i("File manager") => 'admin.file-manager',
                _i("Currencies") => 'admin.currencies',
                _i("Redirections") => 'admin.redirections',
                _i("Settings") => 'admin.settings',
                _i("Routes") => 'admin.routes',
            ];
            ?>
            <ul class="nav nav-pills flex-column">
                @foreach($navs as $title => $route)
                    <li class="nav-item">
                        <a href="{{ route("$route.index") }}" class="nav-link{{ starts_with(Route::currentRouteName(), "$route.") ? ' active' : '' }}">{{ $title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-sm-9 col-md-10">
            @include('flash::message')
            @include('includes.validation-errors')
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset('build/admin.js') }}"></script>
@include('includes.scripts')
@stack('scripts')
</body>
</html>