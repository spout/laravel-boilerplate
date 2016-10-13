{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.contents.store'] : ['admin.contents.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

<div class="form-group">
    {!! Form::label('title', __('Title'), ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', __('Slug'), ['class' => 'control-label']) !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('content', __('Content'), ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}