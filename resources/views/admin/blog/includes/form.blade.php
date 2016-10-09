{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.blog.store'] : ['admin.blog.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

<div class="form-group">
    {!! Form::label('title', __('Title'), ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('content', __('Content'), ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit(__('Submit'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}