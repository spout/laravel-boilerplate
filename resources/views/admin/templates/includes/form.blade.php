@include('includes.ace-editor')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.templates.store'] : ['admin.templates.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('slug', _i('Slug')) !!}
{!! Form::text('slug') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('title', _i('Title')) !!}
{!! Form::text('title') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('template', _i('Template')) !!}
{!! Form::textarea('template', null, ['data-editor' => 'html', 'rows' => 20]) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('template_file', _i('Template file')) !!}
{!! Form::select('template_file', $templateFileList) !!}
{!! Form::closeGroup() !!}

<fieldset>
    <legend>{{ _i("Modules") }}</legend>

    <?php
    $modules = $object->modules;
    for ($i = 0; $i < 5; $i++) {
        $modules->push(new \App\Models\Module());
    }
    ?>

    <div id="modules">
        @foreach($modules as $k => $module)
            <div class="form-group draggable">
                <div class="float-left mr-1">
                    <div class="sortable-handle" style="cursor: move;">
                        <i class="fa fa-arrows"></i>
                    </div>
                </div>
                <div class="row float-left w-75">
                    <div class="col-4">
                        {!! Form::select("modules[{$k}][module_slug]", $moduleList, $module->slug) !!}
                        {!! Form::hidden("modules[{$k}][sort]", $k, ['class' => 'sort']) !!}
                    </div>
                    <div class="col-4">
                        {!! Form::text("modules[{$k}][slug]", '', ['placeholder' => _i("Slug")]) !!}
                    </div>
                    <div class="col-4">
                        {!! Form::text("modules[{$k}][title]", '', ['placeholder' => _i("Title")]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        @endforeach
    </div>
</fieldset>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@push('scripts')
    <script>
        $(function () {
            var $modules = $('#modules');

            Sortable.create($modules.get(0), {
                handle: '.sortable-handle',
                draggable: '.draggable',
                animation: 150,
                onEnd: function () {
                    $modules.find('input.sort').each(function (index) {
                        $(this).val(index);
                    });
                }
            });
        });
    </script>
@endpush