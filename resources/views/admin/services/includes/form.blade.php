{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.services.store'] : ['admin.services.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('category_id', _i('Category')) !!}
{!! Form::select('category_id', $categoryList) !!}
{!! Form::closeGroup() !!}

@foreach(config('app.locales') as $lang => $locale)
    {!! Form::openGroup("name_$lang", _i('Name (%s)', $lang)) !!}
    {!! Form::text("name_$lang") !!}
    {!! Form::closeGroup() !!}
@endforeach

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}