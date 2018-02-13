{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.redirections.store'] : ['admin.redirections.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('domain', _i('Domain')) !!}
{!! Form::text('domain') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('url', _i('URL')) !!}
{!! Form::text('url') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('destination', _i('Destination')) !!}
{!! Form::text('destination') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}