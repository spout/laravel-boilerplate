@include('includes.tinymce')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.forms.store'] : ['admin.forms.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup("title", _i('Title')) !!}
{!! Form::text("title") !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}