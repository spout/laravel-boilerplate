{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.menus.store'] : ['admin.menus.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

<div class="form-group">
    {!! Form::label('title', __('Title'), ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}