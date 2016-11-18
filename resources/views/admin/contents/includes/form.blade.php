@include('includes.tinymce')

{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.contents.store'] : ['admin.contents.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

@include('includes.form-locales-tabs')

<div class="tab-content">
    @foreach(Config::get('app.locales') as $lang => $locale)
        <div role="tabpanel" class="tab-pane{{ $lang == \App::getLocale() ? ' active' : '' }}" id="lang-{{ $lang }}">
            {!! Form::openGroup(sprintf('title_%s', $lang), __('Title')) !!}
            {!! Form::text(sprintf('title_%s', $lang)) !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup(sprintf('slug_%s', $lang), __('Slug')) !!}
            {!! Form::text(sprintf('slug_%s', $lang)) !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup(sprintf('path_%s', $lang), __('Path')) !!}
            {!! Form::text(sprintf('path_%s', $lang)) !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup(sprintf('content_%s', $lang), __('Content')) !!}
            {!! Form::textarea(sprintf('content_%s', $lang), null, ['class' => 'wysiwyg']) !!}
            {!! Form::closeGroup() !!}
        </div>
    @endforeach
</div>

{!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}