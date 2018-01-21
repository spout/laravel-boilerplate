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

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">{{ _i("Administration") }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <?php
            $navs = [
                ['title' => _i("Contents"), 'icon' => 'pencil', 'route' => 'admin.contents.index'],
                ['title' => _i("Blog"), 'icon' => 'newspaper-o', 'route' => 'admin.blog.index'],
                ['title' => _i("Categories"), 'icon' => 'folder', 'route' => 'admin.categories.index'],
                ['title' => _i("Menus"), 'icon' => 'link', 'route' => 'admin.menus.index'],
                ['title' => _i("Snippets"), 'icon' => 'puzzle-piece', 'route' => 'admin.snippets.index'],
                //['title' => _i("Properties"), 'icon' => 'home', 'route' => 'admin.properties.index'],
                //['title' => _i("Event templates"), 'icon' => 'calendar-o', 'route' => 'admin.event-templates.index'],
                //['title' => _i("Email templates"), 'icon' => 'envelope-o', 'route' => 'admin.email-templates.index'],
                //['title' => _i("Emails"), 'icon' => 'envelope', 'route' => 'admin.emails.index'],
                ['title' => _i("Users"), 'icon' => 'users', 'route' => 'admin.users.index'],
                ['title' => _i("Contacts"), 'icon' => 'envelope', 'route' => 'admin.contacts.index'],
                ['title' => _i("File manager"), 'icon' => 'folder-o', 'route' => 'admin.file-manager.index'],
                ['title' => _i("Settings"), 'icon' => 'cogs', 'route' => 'admin.settings.index'],
                ['title' => _i("Routes"), 'icon' => 'road', 'route' => 'admin.routes.index'],
            ];
            ?>
            <ul class="navbar-nav mr-auto">
                @foreach($navs as $nav)
                    <li class="nav-item">
                        <a href="{{ route($nav['route']) }}" class="nav-link">{{--<i class="fa fa-{{ $nav['icon'] }} fa-fw"></i> --}}{{ $nav['title'] }}</a>
                    </li>
                @endforeach
            </ul>
            @if (Auth::check())
                <ul class="navbar-nav">
                    <li class="navbar-text">{{ Auth::user()->name }}</li>
                    <li class="nav-item">
                        <a href="#" onclick="document.logout.submit();return false;" class="nav-link"><i class="fa fa-sign-out"></i> {{ _i("Logout") }}</a>
                        {{ Form::open(['route' => 'logout', 'method' => 'post', 'name' => 'logout']) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>

<div class="container-fluid">
    @include('flash::message')
    @include('includes.validation-errors')
    @yield('content')
</div>
<script src="{{ asset('build/admin.js') }}"></script>
@include('includes.scripts')
@stack('scripts')
</body>
</html>