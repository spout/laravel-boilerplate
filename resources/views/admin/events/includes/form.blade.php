@include('includes.tinymce')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.events.store'] : ['admin.events.update', $object->pk],
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

            {!! Form::openGroup("description_$lang", _i('Description (%s)', $lang)) !!}
            {!! Form::textarea("description_$lang", null, ['class' => 'wysiwyg']) !!}
            {!! Form::closeGroup() !!}
        </div>
    @endforeach

    <div class="row">
        <div class="col">
            {!! Form::openGroup('date_start', _i("Start date")) !!}
            {!! Form::date('date_start') !!}
            {!! Form::closeGroup() !!}
        </div>
        <div class="col">
            {!! Form::openGroup('date_end', _i("End date")) !!}
            {!! Form::date('date_end') !!}
            {!! Form::closeGroup() !!}
        </div>
    </div>

    {!! Form::openGroup('address', _i("Address")) !!}
    {!! Form::text('address') !!}
    {!! Form::closeGroup() !!}

    {!! Form::hidden('lat') !!}
    {!! Form::hidden('lng') !!}

    {!! Form::openGroup('country', _i("Country")) !!}
    {!! Form::select('country') !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('city', _i("City")) !!}
    {!! Form::text('city') !!}
    {!! Form::closeGroup() !!}
</div>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}