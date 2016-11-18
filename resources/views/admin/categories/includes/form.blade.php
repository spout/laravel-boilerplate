{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.categories.store'] : ['admin.categories.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('parent_id', __('Parent')) !!}
{!! Form::select('parent_id') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('title', __('Title')) !!}
{!! Form::text('title') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}