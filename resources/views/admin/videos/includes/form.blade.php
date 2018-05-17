{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.videos.store'] : ['admin.videos.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

@include('includes.modules.forms.videos')

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}