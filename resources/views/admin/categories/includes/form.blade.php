{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.categories.store'] : ['admin.categories.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('parent_id', _i('Parent')) !!}
{!! Form::select('parent_id', $categoryList) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('title_singular', _i('Title singular')) !!}
{!! Form::text('title_singular') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('slug_singular', _i('Slug singular')) !!}
{!! Form::text('slug_singular') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('title_plural', _i('Title plural')) !!}
{!! Form::text('title_plural') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('slug_plural', _i('Slug plural')) !!}
{!! Form::text('slug_plural') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('h1', _i('H1')) !!}
{!! Form::text('h1') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('meta_description', _i('Meta description')) !!}
{!! Form::textarea('meta_description') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('description', _i('Description')) !!}
{!! Form::textarea('description') !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}