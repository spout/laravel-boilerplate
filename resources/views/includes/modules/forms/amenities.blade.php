<?php
$locale = \LaravelLocalization::getCurrentLocale();
dump($moduleModelInstances->toArray());
?>
{!! Form::openGroup('amenities[]') !!}
@foreach($amenities as $amenity)
    {!! Form::inlineCheckbox('amenities[]', $amenity->id, $amenity->{"name_{$locale}"}) !!}
@endforeach
{!! Form::closeGroup() !!}