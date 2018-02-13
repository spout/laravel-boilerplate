@include('includes.tinymce')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.offers.store'] : ['admin.offers.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

@include('includes.form-locales-tabs')

<div class="tab-content">
    {!! Form::openGroup("event_type_id", _i('Type')) !!}
    {!! Form::select("event_type_id", []) !!}
    {!! Form::closeGroup() !!}

    @foreach(Config::get('app.locales') as $lang => $locale)
        <div role="tabpanel" class="tab-pane{{ $lang == \LaravelLocalization::getCurrentLocale() ? ' active' : '' }}" id="lang-{{ $lang }}">
            {!! Form::openGroup("title_$lang", _i('Title (%s)', $lang)) !!}
            {!! Form::text("title_$lang") !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("path_$lang", _i('Path (%s)', $lang)) !!}
            {!! Form::text("path_$lang") !!}
            @if (!empty($object->{"path_$lang"}))
                <a href="{{ LaravelLocalization::getLocalizedURL($lang, route('contents.show', ['path' => $object->{"path_$lang"}])) }}" target="_blank">
                    {{ LaravelLocalization::getLocalizedURL($lang, route('contents.show', ['path' => $object->{"path_$lang"}])) }}
                </a>
            @endif
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("content_$lang", _i('Content (%s)', $lang)) !!}
            {!! Form::textarea("content_$lang", null, ['class' => 'wysiwyg']) !!}
            {!! Form::closeGroup() !!}
        </div>
    @endforeach
</div>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}