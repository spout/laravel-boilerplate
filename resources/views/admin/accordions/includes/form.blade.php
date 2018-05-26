{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.accordions.store'] : ['admin.accordions.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

@include('includes.modules.forms.accordions')

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}