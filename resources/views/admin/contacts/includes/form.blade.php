{!! Form::model($object, [
    'route' => empty($object->key) ? ['admin.contacts.store'] : ['admin.contacts.update', $object->key],
    'method' => empty($object->key) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('email', __('Email')) !!}
{!! Form::text('email') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('subject', __('Subject')) !!}
{!! Form::text('subject') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('message', __('Message')) !!}
{!! Form::textarea('message') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}