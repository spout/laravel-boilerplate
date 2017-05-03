{!! Form::model($object, [
    'route' => empty($object->key) ? ['admin.contacts.store'] : ['admin.contacts.update', $object->key],
    'method' => empty($object->key) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('email', _i('Email')) !!}
{!! Form::text('email') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('subject', _i('Subject')) !!}
{!! Form::text('subject') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('message', _i('Message')) !!}
{!! Form::textarea('message') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}