{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.currencies.store'] : ['admin.currencies.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('code', _i('Code')) !!}
{!! Form::text('code') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('name', _i('Name')) !!}
{!! Form::text('name') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('symbol', _i('Symbol')) !!}
{!! Form::text('symbol') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}