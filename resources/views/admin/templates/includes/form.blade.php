@include('includes.ace-editor')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.templates.store'] : ['admin.templates.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('slug', _i('Slug')) !!}
{!! Form::text('slug') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('template', _i('Template')) !!}
{!! Form::textarea('template', null, ['data-editor' => 'html', 'rows' => 20]) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('template_file', _i('Template file')) !!}
{!! Form::select('template_file', $templateFileList) !!}
{!! Form::closeGroup() !!}

<fieldset>
    <legend>{{ _i("Placeholders") }}</legend>

    <?php
    $templateSlug = $object->slug;
    $placeholders = [];

    foreach ($object->placeholders as $placeholder) {
        $module = $object->modules->first(function ($value, $key) use ($placeholder) {
            return $value->pivot->placeholder === $placeholder;
        });

        if (empty($module)) {
            $placeholders[] = new \App\Models\Placeholder(['placeholder' => $placeholder]);
        } else {
            $placeholders[] = $module->pivot;
        }
    }
    ?>

    @foreach($placeholders as $k => $placeholder)
        {!! Form::hidden("placeholders[{$k}][id]", $placeholder->id) !!}
        {!! Form::hidden("placeholders[{$k}][placeholder]", $placeholder->placeholder) !!}
        {!! Form::hidden("placeholders[{$k}][order]", $k) !!}

        <fieldset class="py-0 mb-0">
            <legend>{{ "{% {$placeholder->placeholder} %}" }}</legend>
            <div class="row">
                <div class="col">
                    {!! Form::openGroup("placeholders[{$k}][module_slug]", _i("Module")) !!}
                    {!! Form::select("placeholders[{$k}][module_slug]", $moduleList, $placeholder->module_slug) !!}
                    {!! Form::closeGroup() !!}
                </div>
                @foreach(config('app.locales') as $lang => $locale)
                    <div class="col">
                        {!! Form::openGroup("placeholders[{$k}][title_{$lang}]", _i("Title (%s)", $lang)) !!}
                        {!! Form::text("placeholders[{$k}][title_{$lang}]", $placeholder->{"title_{$lang}"}) !!}
                        {!! Form::closeGroup() !!}
                    </div>
                @endforeach
            </div>
        </fieldset>
    @endforeach

</fieldset>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}