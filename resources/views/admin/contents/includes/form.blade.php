@include('includes.tinymce')

{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.contents.store'] : ['admin.contents.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

@include('includes.form-locales-tabs')

<div class="tab-content">
    {!! Form::openGroup("parent_id", _i('Parent')) !!}
    {!! Form::select("parent_id", $contentList) !!}
    {!! Form::closeGroup() !!}

    @foreach(Config::get('app.locales') as $lang => $locale)
        <div role="tabpanel" class="tab-pane{{ $lang == \App::getLocale() ? ' active' : '' }}" id="lang-{{ $lang }}">
            {!! Form::openGroup("title_$lang", _i('Title')) !!}
            {!! Form::text("title_$lang") !!}
            {!! Form::closeGroup() !!}

            {{--{!! Form::openGroup("slug_$lang", _i('Slug')) !!}--}}
            {{--{!! Form::text("slug_$lang") !!}--}}
            {{--{!! Form::closeGroup() !!}--}}

            {!! Form::openGroup("path_$lang", _i('Path')) !!}
            {!! Form::text("path_$lang") !!}
            @if (!empty($object->{"path_$lang"}))
                <a href="{{ LaravelLocalization::getLocalizedURL($lang, route('contents.show', ['path' => $object->{"path_$lang"}])) }}" target="_blank">
                    {{ LaravelLocalization::getLocalizedURL($lang, route('contents.show', ['path' => $object->{"path_$lang"}])) }}
                </a>
            @endif
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("content_$lang", _i('Content')) !!}
            {!! Form::textarea("content_$lang", null, ['class' => 'wysiwyg']) !!}
            {!! Form::closeGroup() !!}
        </div>
    @endforeach
</div>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}