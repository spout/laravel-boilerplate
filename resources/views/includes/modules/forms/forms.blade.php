{!! Form::openGroup('modulables[0]', _i('Form')) !!}
{!! Form::select('modulables[0]', $formList, $moduleModelInstance->modulable_id) !!}
{!! Form::closeGroup() !!}