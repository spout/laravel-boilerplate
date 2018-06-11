{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.neighborhoods.store'] : ['admin.neighborhoods.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

@foreach(config('app.locales') as $lang => $locale)
    {!! Form::openGroup("name_$lang", _i('Name (%s)', $lang)) !!}
    {!! Form::text("name_$lang") !!}
    {!! Form::closeGroup() !!}
@endforeach

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}