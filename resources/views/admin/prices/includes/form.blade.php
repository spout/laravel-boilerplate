{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.prices.store'] : ['admin.prices.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('product_id', _i('Product')) !!}
{!! Form::select('product_id', []) !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}