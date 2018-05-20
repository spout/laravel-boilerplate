@include('includes.google-place-autocomplete', ['domId' => 'location'])

<div class="row">
    <div class="col">
        {!! Form::openGroup('lat', _i('Latitude')) !!}
        {!! Form::number('lat', null, ['step' => 'any']) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col">
        {!! Form::openGroup('lng', _i('Longitude')) !!}
        {!! Form::number('lng', null, ['step' => 'any']) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col">
        {!! Form::openGroup('zoom', _i('Zoom')) !!}
        {!! Form::range('zoom', $moduleModelInstance->zoom ?? 13, ['min' => 0, 'max' => 19, 'step' => 1]) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

<?php
$mapTypeList = [
    'ROADMAP' => _i('Roadmap'),
    'SATELLITE' => _i('Satellite'),
    'HYBRID' => _i('Hybrid'),
    'TERRAIN' => _i('Terrain'),
];
?>
<fieldset>
    <legend>{{ _i("Map type") }}</legend>
    {!! Form::openGroup('map_type', null, ['class' => 'mb-0']) !!}
        @foreach($mapTypeList as $value => $label)
            {!! Form::inlineRadio('map_type', $value, $label, 'ROADMAP' === $value) !!}
        @endforeach
    {!! Form::closeGroup() !!}
</fieldset>

