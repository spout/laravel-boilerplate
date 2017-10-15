{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.emails.store'] : ['admin.emails.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('to', _i('To')) !!}
{!! Form::email('to') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('subject', _i('Subject')) !!}
{!! Form::text('subject') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('message', _i('Message')) !!}
{!! Form::textarea('message') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}