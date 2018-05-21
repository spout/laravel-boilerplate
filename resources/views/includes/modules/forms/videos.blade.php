<?php
$aspectRatioList = [
    '21by9' => '21/9',
    '16by9' => '16/9',
    '4by3' => '4/3',
    '1by1' => '1/1',
];
?>

{!! Form::openGroup('url', _i('URL')) !!}
{!! Form::url('url') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('aspect_ratio', _i('Aspect ratio')) !!}
{!! Form::select('aspect_ratio', $aspectRatioList, $moduleModelInstance->aspect_ratio ?? '16by9') !!}
{!! Form::closeGroup() !!}