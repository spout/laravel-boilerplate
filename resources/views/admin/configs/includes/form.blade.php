@include('includes.ace-editor')

{!! Form::model($object, [
    'route' => empty($object->key) ? ['admin.configs.store'] : ['admin.configs.update', $object->key],
    'method' => empty($object->key) ? 'POST' : 'PUT'
]) !!}

<div class="form-group">
    {!! Form::label('key', __('Key'), ['class' => 'control-label']) !!}
    {!! Form::text('key', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('value', __('Value'), ['class' => 'control-label']) !!}
    {!! Form::textarea('value', null, ['class' => 'form-control', 'data-editor' => 'json']) !!}
</div>

{!! Form::submit(__('Submit'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}