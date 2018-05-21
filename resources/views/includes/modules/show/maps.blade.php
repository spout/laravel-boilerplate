<?php
$attributes = [
    'class' => 'google-map w-100',
    'style' => 'height: 500px;',
    'data-lat' => $moduleModelInstance->lat,
    'data-lng' => $moduleModelInstance->lng,
    'data-zoom' => $moduleModelInstance->zoom,
    'data-map-type' => $moduleModelInstance->map_type,
];
?>
<div {!! Html::attributes($attributes) !!}></div>