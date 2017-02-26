<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') :: {{ __("Administration") }}</title>

    @stack('styles')
    <link href="{{ asset('build/admin.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">{{ __("Administration") }}</a>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 col-md-push-3">
            @include('flash::message')
            @yield('content')
        </div>
        <div class="col-md-3 col-md-pull-9">
            <?php
            $navs = [
                ['title' => __("Contents"), 'icon' => 'pencil', 'route' => 'admin.contents.index'],
                ['title' => __("Blog"), 'icon' => 'newspaper-o', 'route' => 'admin.blog.index'],
                ['title' => __("Categories"), 'icon' => 'folder', 'route' => 'admin.categories.index'],
                ['title' => __("Menus"), 'icon' => 'link', 'route' => 'admin.menus.index'],
                ['title' => __("Users"), 'icon' => 'users', 'route' => 'admin.users.index'],
                ['title' => __("Contacts"), 'icon' => 'envelope', 'route' => 'admin.contacts.index'],
                ['title' => __("File manager"), 'icon' => 'folder-o', 'route' => 'admin.file_manager.index'],
                ['title' => __("Settings"), 'icon' => 'cogs', 'route' => 'admin.settings.index'],
            ];
            ?>
            <ul class="nav nav-pills nav-stacked">
                @foreach($navs as $nav)
                    <li>
                        <a href="{{ route($nav['route']) }}"><i class="fa fa-{{ $nav['icon'] }} fa-fw"></i> {{ $nav['title'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<script src="{{ asset('build/admin.js') }}"></script>
@stack('scripts')
</body>
</html>