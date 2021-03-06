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
$tags = $object->tags;
$count = $tags->count();

for ($i = 0; $i < 5; $i++) {
    $tags->push(new \App\Models\Tag(['sort' => $i + $count]));
}
?>

<fieldset class="py-0">
    <legend>{{ _i("Tags") }}</legend>
    @foreach($tags as $k => $tag)
        {!! Form::hidden("tags[$k][id]", $tag->id) !!}
        {!! Form::hidden("tags[$k][sort]", $k) !!}
        <div class="row">
            @foreach(config('app.locales') as $lang => $locale)
                <div class="col">
                    {!! Form::openGroup("tags[$k][name_{$lang}]", _i('Tag %d name (%s)', [$k + 1, $lang])) !!}
                    {!! Form::text("tags[$k][name_{$lang}]") !!}
                    {!! Form::closeGroup() !!}
                </div>
            @endforeach
        </div>
    @endforeach
</fieldset>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}