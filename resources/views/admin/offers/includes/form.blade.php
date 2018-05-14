@include('includes.tinymce')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.offers.store'] : ['admin.offers.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}