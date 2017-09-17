@include('includes.tinymce')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.email-templates.store'] : ['admin.email-templates.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('to', _i('To')) !!}
{!! Form::text('to') !!}
{!! Form::closeGroup() !!}

@include('includes.templates-tags-form', ['title' => _i("Available tags for subject and template:")])

{!! Form::openGroup('subject', _i('Subject')) !!}
{!! Form::text('subject') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('template', _i('Template')) !!}
{!! Form::textarea('template', null, ['class' => 'wysiwyg']) !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}