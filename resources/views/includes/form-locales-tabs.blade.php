<?php
$idPrefix = isset($idPrefix) ? $idPrefix : 'lang-';
?>
<ul class="nav nav-tabs mb-2">
    @foreach(Config::get('app.locales') as $lang => $locale)
        <li class="nav-item">
            <a href="#{{ $idPrefix . $lang }}" class="nav-link{{ $lang == \LaravelLocalization::getCurrentLocale() ? ' active' : '' }}" data-toggle="tab"><img src="{{ asset("img/flags/{$lang}.gif") }}"> {{ $locale }}</a>
        </li>
    @endforeach
</ul>