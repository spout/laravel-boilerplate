{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.after-sales-services.store'] : ['admin.after-sales-services.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('provider', _i("Provider"), ['class' => 'required']) !!}
{!! Form::text('provider', null, ['required' => 'required']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('order_number', _i("Order number"), ['class' => 'required']) !!}
{!! Form::text('order_number', null, ['required' => 'required']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('position', _i("Position"), ['class' => 'required']) !!}
{!! Form::text('position', null, ['required' => 'required']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('description', _i("Problem description"), ['class' => 'required']) !!}
{!! Form::textarea('description', null, ['required' => 'required']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('photo', _i("Photo"), ['class' => 'required']) !!}
{!! Form::file('photo') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('firstname', _i("Firstname"), ['class' => 'required']) !!}
{!! Form::text('firstname', null, ['required' => 'required']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('lastname', _i("Lastname"), ['class' => 'required']) !!}
{!! Form::text('lastname', null, ['required' => 'required']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('address', _i("Address"), ['class' => 'required']) !!}
{!! Form::textarea('address', null, ['required' => 'required']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('phone', _i("Phone"), ['class' => 'required']) !!}
{!! Form::text('phone', null, ['required' => 'required']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('email', _i("Email"), ['class' => 'required']) !!}
{!! Form::email('email', null, ['required' => 'required']) !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}