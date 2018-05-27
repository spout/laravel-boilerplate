@include('includes.elfinder-standalonepopup')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.categories.store'] : ['admin.categories.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('parent_id', _i('Parent')) !!}
{!! Form::select('parent_id', $categoryList) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('marker_icon', _i('Marker icon')) !!}
<div class="input-group">
    {!! Form::text('marker_icon') !!}
    <div class="input-group-append">
        <a href="#" class="input-group-text popup_selector" data-inputid="marker_icon">{{ _i("Select marker") }}</a>
    </div>
</div>
{!! Form::closeGroup() !!}

@include('includes.form-locales-tabs')

<div class="tab-content">
    @foreach(Config::get('app.locales') as $lang => $locale)
        <div role="tabpanel" class="tab-pane{{ $lang == \LaravelLocalization::getCurrentLocale() ? ' active' : '' }}" id="lang-{{ $lang }}">
            {!! Form::openGroup("title_singular_$lang", _i('Title singular (%s)', $lang)) !!}
            {!! Form::text("title_singular_$lang") !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("slug_singular_$lang", _i('Slug singular (%s)', $lang)) !!}
            {!! Form::text("slug_singular_$lang") !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("title_plural_$lang", _i('Title plural (%s)', $lang)) !!}
            {!! Form::text("title_plural_$lang") !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("slug_plural_$lang", _i('Slug plural (%s)', $lang)) !!}
            {!! Form::text("slug_plural_$lang") !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("h1_$lang", _i('H1 (%s)', $lang)) !!}
            {!! Form::text("h1_$lang") !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("meta_description_$lang", _i('Meta description (%s)', $lang)) !!}
            {!! Form::text("meta_description_$lang") !!}
            {!! Form::closeGroup() !!}
        </div>
    @endforeach
</div>

<?php
$criterias = $object->criterias;
$count = $criterias->count();

for ($i = 0; $i < 5; $i++) {
    $criterias->push(new \App\Models\Criteria(['sort' => $i + $count]));
}
?>

<fieldset class="py-0">
    <legend>{{ _i("Criterias") }}</legend>
    @foreach($criterias as $k => $criteria)
        <fieldset class="py-0 mb-0">
            {!! Form::hidden("criterias[$k][id]", $criteria->id) !!}
            {!! Form::hidden("criterias[$k][sort]", $k) !!}
            <legend>{{ _i("Criteria %d", $k + 1) }}</legend>
            <div class="row">
                @foreach(config('app.locales') as $lang => $locale)
                    <div class="col">
                        {!! Form::openGroup("criterias[$k][name_{$lang}]", _i('Name (%s)', $lang)) !!}
                        {!! Form::text("criterias[$k][name_{$lang}]") !!}
                        {!! Form::closeGroup() !!}
                    </div>
                @endforeach
            </div>
        </fieldset>
    @endforeach
</fieldset>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}