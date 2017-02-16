{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.users.store'] : ['admin.users.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('username', __('Username')) !!}
{!! Form::text('username') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('email', __('Email')) !!}
{!! Form::text('email') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('password', __('Password')) !!}
{!! Form::password('password') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('firstname', __('Firstname')) !!}
{!! Form::text('firstname') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('lastname', __('Lastname')) !!}
{!! Form::text('lastname') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('role', __('Role')) !!}
{!! Form::select('role', ['' => '-'] + \App\Models\User::$roles) !!}
{!! Form::closeGroup() !!}

{!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}