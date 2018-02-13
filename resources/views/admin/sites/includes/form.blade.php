{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.sites.store'] : ['admin.sites.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('slug', _i('Slug')) !!}
{!! Form::text('slug') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('domain', _i('Domain')) !!}
{!! Form::text('domain') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('name', _i('Name')) !!}
{!! Form::text('name') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}