@include('includes.ace-editor')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.settings.store'] : ['admin.settings.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('key', _i('Key')) !!}
{!! Form::text('key') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('value', _i('Value')) !!}
{!! Form::textarea('value', null, ['data-editor' => 'json']) !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}