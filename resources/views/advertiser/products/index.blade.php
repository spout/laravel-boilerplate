@extends('layouts.advertiser')

@section('title', _i("Products"))

@section('content')
    <ul class="nav nav-tabs">
        @foreach($modules as $module)
            <li class="nav-item">
                <a class="nav-link{{ $slug === $module->slug ? ' active' : '' }}" href="{{ route('advertiser.products.index', ['slug' => $module->slug]) }}">{{ $module->title }}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach($modules as $module)
            <div class="tab-pane" id="module-{{ $module->slug }}">
                {{ $module->title }}
            </div>
        @endforeach
    </div>
@endsection