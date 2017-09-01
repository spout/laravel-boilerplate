@include('includes.ace-editor')

{!! Form::model($object, [
    'route' => empty($object->key) ? ['admin.settings.store'] : ['admin.settings.update', $object->key],
    'method' => empty($object->key) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('key', _i('Key')) !!}
{!! Form::text('key') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('value', _i('Value')) !!}
{!! Form::textarea('value', null, ['data-editor' => 'json']) !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}