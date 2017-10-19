@include('includes.tinymce')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.snippets.store'] : ['admin.snippets.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

@include('includes.form-locales-tabs')

<div class="tab-content">
    {!! Form::openGroup('slug', _i('Slug')) !!}
    {!! Form::text('slug') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup("template", _i('Template')) !!}
    {!! Form::select("template", []) !!}
    {!! Form::closeGroup() !!}

    @foreach(Config::get('app.locales') as $lang => $locale)
        <div role="tabpanel" class="tab-pane{{ $lang == \App::getLocale() ? ' active' : '' }}" id="lang-{{ $lang }}">
            {!! Form::openGroup("title_$lang", _i('Title (%s)', $lang)) !!}
            {!! Form::text("title_$lang") !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("content_$lang", _i('Content (%s)', $lang)) !!}
            {!! Form::textarea("content_$lang", null, ['class' => 'wysiwyg']) !!}
            {!! Form::closeGroup() !!}
        </div>
    @endforeach
</div>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}