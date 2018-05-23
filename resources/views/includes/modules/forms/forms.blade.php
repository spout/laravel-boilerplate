{!! Form::openGroup('forms[0]', _i('Form')) !!}
{!! Form::select('forms[0]', $formList, $moduleModelInstance->form_id) !!}
{!! Form::closeGroup() !!}