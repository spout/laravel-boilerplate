{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.after-sales-services.store'] : ['admin.after-sales-services.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

@include('includes.after-sales-services.form')

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}