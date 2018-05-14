@include('includes.tinymce')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.contents.store'] : ['admin.contents.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

@include('includes.form-locales-tabs')

<div class="tab-content">
    {{--{!! Form::openGroup("type", _i('Type')) !!}--}}
    {{--@foreach(['html' => 'HTML', 'markdown' => 'Markdown'] as $value => $label)--}}
        {{--{!! Form::radio('type', $value, $label, empty($object->type) ? $value === 'html' : $object->type === $value, ['id' => "type-{$value}"]) !!}--}}
    {{--@endforeach--}}
    {{--{!! Form::closeGroup() !!}--}}

    {!! Form::openGroup("parent_id", _i('Parent')) !!}
    {!! Form::select("parent_id", $contentList) !!}
    {!! Form::closeGroup() !!}

    @foreach(Config::get('app.locales') as $lang => $locale)
        <div role="tabpanel" class="tab-pane{{ $lang == \LaravelLocalization::getCurrentLocale() ? ' active' : '' }}" id="lang-{{ $lang }}">
            {!! Form::openGroup("title_$lang", _i('Title (%s)', $lang)) !!}
            {!! Form::text("title_$lang") !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("path_$lang", _i('Path (%s)', $lang)) !!}
            {!! Form::text("path_$lang") !!}
            @if (!empty($object->{"path_$lang"}))
                <a href="{{ $object->getAbsoluteLocalizedUrl($lang) }}" target="_blank">{{ $object->getAbsoluteLocalizedUrl($lang) }}</a>
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

{{--@push('scripts')--}}
    {{--<script>--}}
        {{--$(function() {--}}
            {{--$('input[type="radio"][name="type"]').change(function () {--}}
                {{--switch ($(this).val()) {--}}
                    {{--case 'html':--}}
                        {{--tinymce.init(window.tinymceInitSettings);--}}
                        {{--break;--}}

                    {{--case 'markdown':--}}
                        {{--tinymce.remove(window.tinymceInitSettings.selector);--}}
                        {{--break;--}}

                    {{--default:--}}
                        {{--break;--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endpush--}}