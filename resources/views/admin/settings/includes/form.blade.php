@include('includes.ace-editor')

{!! Form::model($object, [
    'route' => empty($object->key) ? ['admin.settings.store'] : ['admin.settings.update', $object->key],
    'method' => empty($object->key) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('key', __('Key')) !!}
{!! Form::text('key') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('value_display', __('Value')) !!}
{!! Form::textarea('value_display', !empty($object->value) ? json_encode($object->value) : null, ['data-editor' => 'json']) !!}
{!! Form::closeGroup() !!}

{!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}