{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.categories.store'] : ['admin.categories.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('parent_id', _i('Parent')) !!}
{!! Form::select('parent_id', $categoryList) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('title', _i('Title')) !!}
{!! Form::text('title') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}