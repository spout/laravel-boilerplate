@include('includes.tinymce')
@include('includes.elfinder-standalonepopup')

@include('admin.products.includes.form-nav-tabs')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.products.store'] : ['admin.products.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('category_id', _i('Category')) !!}
{!! Form::select('category_id', $categoryList) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('template_slug', _i('Template')) !!}
{!! Form::select('template_slug', $templateList) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('featured_image', _i('Featured image')) !!}
<div class="input-group">
    {!! Form::text('featured_image') !!}
    <div class="input-group-append">
        <a href="#" class="input-group-text popup_selector" data-inputid="featured_image">{{ _i("Select image") }}</a>
    </div>
</div>
{!! Form::closeGroup() !!}

@include('includes.form-locales-tabs')

<div class="tab-content">
    @foreach(Config::get('app.locales') as $lang => $locale)
        <div role="tabpanel" class="tab-pane{{ $lang == \LaravelLocalization::getCurrentLocale() ? ' active' : '' }}" id="lang-{{ $lang }}">
            {!! Form::openGroup("title_$lang", _i('Title (%s)', $lang)) !!}
            {!! Form::text("title_$lang") !!}
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("slug_$lang", _i('Slug (%s)', $lang)) !!}
            {!! Form::text("slug_$lang") !!}
            @if (!empty($object->{"slug_$lang"}))
                <a href="{{ $object->getAbsoluteLocalizedUrl($lang) }}" target="_blank">{{ $object->getAbsoluteLocalizedUrl($lang) }}</a>
            @endif
            {!! Form::closeGroup() !!}

            {!! Form::openGroup("content_$lang", _i('Content (%s)', $lang)) !!}
            {!! Form::textarea("content_$lang", null, ['class' => 'wysiwyg']) !!}
            {!! Form::closeGroup() !!}

            <fieldset>
                <legend>{{ _i("SEO") }}</legend>

                {!! Form::openGroup("h1_$lang", _i('H1 (%s)', $lang)) !!}
                {!! Form::text("h1_$lang") !!}
                {!! Form::closeGroup() !!}

                {!! Form::openGroup("meta_description_$lang", _i('Meta description (%s)', $lang)) !!}
                {!! Form::textarea("meta_description_$lang", null, ['rows' => 2]) !!}
                {!! Form::closeGroup() !!}
            </fieldset>
        </div>
    @endforeach
</div>

<fieldset>
    <legend>{{ _i("Tags") }}</legend>

    <?php
    $checked = array_column($object->tags->toArray(), 'id');
    ?>
    <div class="form-group">
        @foreach($object->category->tags as $tag)
            <?php
            $id = "tag-{$tag->id}";
            ?>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" name="tags[]" class="custom-control-input" id="{{ $id }}" value="{{ $tag->id }}" {{ in_array($tag->id, $checked) ? 'checked' : '' }}>
                <label class="custom-control-label" for="{{ $id }}">{{ $tag->name }}</label>
            </div>
        @endforeach
    </div>
</fieldset>

<fieldset>
    <legend>{{ _i("Location") }}</legend>

    @include('includes.google-place-autocomplete', ['domId' => 'location'])

    <div class="row">
        <div class="col">
            {!! Form::openGroup('lat', _i('Latitude')) !!}
            {!! Form::number('lat', null, ['step' => 'any']) !!}
            {!! Form::closeGroup() !!}
        </div>
        <div class="col">
            {!! Form::openGroup('lng', _i('Longitude')) !!}
            {!! Form::number('lng', null, ['step' => 'any']) !!}
            {!! Form::closeGroup() !!}
        </div>
    </div>

    {!! Form::openGroup('country', _i('Country')) !!}
    {!! Form::select('country', $countryList) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('neighborhood_id', _i('Neighborhood')) !!}
    {!! Form::select('neighborhood_id', $neighborhoodList) !!}
    {!! Form::closeGroup() !!}

    <div class="row">
        <div class="col-4">
            {!! Form::openGroup('postcode', _i('Postcode')) !!}
            {!! Form::text('postcode') !!}
            {!! Form::closeGroup() !!}
        </div>
        <div class="col-8">
            {!! Form::openGroup('city', _i('City')) !!}
            {!! Form::text('city') !!}
            {!! Form::closeGroup() !!}
        </div>
    </div>

    {!! Form::openGroup('address', _i('Address')) !!}
    {!! Form::text('address') !!}
    {!! Form::closeGroup() !!}
</fieldset>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}