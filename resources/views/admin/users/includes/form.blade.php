{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.users.store'] : ['admin.users.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('company', _i('Company')) !!}
{!! Form::text('company') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('firstname', _i('Firstname')) !!}
{!! Form::text('firstname') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('lastname', _i('Lastname')) !!}
{!! Form::text('lastname') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('email', _i('Email')) !!}
{!! Form::text('email') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('password', _i('Password')) !!}
{!! Form::password('password') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('is_admin') !!}
{!! Form::checkbox('is_admin', 1, _i('Admin?')) !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}