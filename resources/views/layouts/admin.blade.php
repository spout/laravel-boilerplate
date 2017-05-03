<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') :: {{ _i("Administration") }}</title>

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
            <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">{{ _i("Administration") }}</a>
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
                ['title' => _i("Contents"), 'icon' => 'pencil', 'route' => 'admin.contents.index'],
                ['title' => _i("Blog"), 'icon' => 'newspaper-o', 'route' => 'admin.blog.index'],
                ['title' => _i("Categories"), 'icon' => 'folder', 'route' => 'admin.categories.index'],
                ['title' => _i("Menus"), 'icon' => 'link', 'route' => 'admin.menus.index'],
                ['title' => _i("Users"), 'icon' => 'users', 'route' => 'admin.users.index'],
                ['title' => _i("Contacts"), 'icon' => 'envelope', 'route' => 'admin.contacts.index'],
                ['title' => _i("File manager"), 'icon' => 'folder-o', 'route' => 'admin.file_manager.index'],
                ['title' => _i("Settings"), 'icon' => 'cogs', 'route' => 'admin.settings.index'],
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