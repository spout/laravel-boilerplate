@include('includes.elfinder-standalonepopup')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.galleries.store'] : ['admin.galleries.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup("slug", _i('Slug')) !!}
{!! Form::text("slug") !!}
{!! Form::closeGroup() !!}

@include('includes.form-locales-tabs')
<div class="tab-content">
    @foreach(Config::get('app.locales') as $lang => $locale)
        <div role="tabpanel" class="tab-pane{{ $lang == \LaravelLocalization::getCurrentLocale() ? ' active' : '' }}" id="lang-{{ $lang }}">
            {!! Form::openGroup("title_$lang", _i('Title (%s)', $lang)) !!}
            {!! Form::text("title_$lang") !!}
            {!! Form::closeGroup() !!}
        </div>
    @endforeach
</div>

<div class="form-group">
    <a href="#" class="popup_selector btn btn-primary" data-inputid="photos" data-options-callback="elFinderOptionsCallback">{{ _i("Select photos") }}</a>
</div>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@push('scripts')
    <script>
        function elFinderOptionsCallback() {
            return {
                commandsOptions: {
                    getfile: {
                        folders: false,
                        multiple: true
                    }
                },
                getFileCallback: function (files) {
                    console.log(files);
                    parent.jQuery.colorbox.close();
                }
            }
        }
    </script>
@endpush