{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.newsletters.store'] : ['admin.newsletters.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('email', _i('Email')) !!}
{!! Form::email('email') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('firstname', _i('Firstname')) !!}
{!! Form::text('firstname') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('lastname', _i('Lastname')) !!}
{!! Form::text('lastname') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}