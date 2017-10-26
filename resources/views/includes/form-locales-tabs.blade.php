<?php
$idPrefix = isset($idPrefix) ? $idPrefix : 'lang-';
?>
<ul class="nav nav-tabs" role="tablist">
    @foreach(Config::get('app.locales') as $lang => $locale)
    <li role="presentation" class="{{ $lang == \LaravelLocalization::getCurrentLocale() ? 'active' : '' }}">
        <a href="#{{ $idPrefix . $lang }}" role="tab" data-toggle="tab">{{ $locale }}</a>
    </li>
    @endforeach
</ul>