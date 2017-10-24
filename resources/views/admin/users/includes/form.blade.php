{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.users.store'] : ['admin.users.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('name', _i('Name')) !!}
{!! Form::text('name') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('email', _i('Email')) !!}
{!! Form::text('email') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('password', _i('Password')) !!}
{!! Form::password('password') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('is_admin', _i('Admin?')) !!}
{!! Form::checkbox('is_admin') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}