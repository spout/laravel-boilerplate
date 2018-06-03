<?php
$selected = array_column($moduleModelInstances->toArray(), 'modulable_id')
?>

{!! Form::openGroup('modulables[]', _i('Related products')) !!}
{!! Form::select('modulables[]', $productList, $selected, ['multiple' => 'multiple']) !!}
{!! Form::closeGroup() !!}