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

{!! Form::openGroup('directory', _i('Directory')) !!}
<div class="input-group">
    {!! Form::text('directory') !!}
    <div class="input-group-append">
        <div class="input-group-text">
            <a href="#" class="popup_selector" data-inputid="directory">{{ _i("Select directory") }}</a>
        </div>
    </div>
</div>
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}