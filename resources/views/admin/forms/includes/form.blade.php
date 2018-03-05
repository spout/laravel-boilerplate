@include('includes.tinymce')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.forms.store'] : ['admin.forms.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT',
    'novalidate' => true
]) !!}

{!! Form::openGroup("title", _i('Title')) !!}
{!! Form::text("title") !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup("submit", _i('Submit button label')) !!}
{!! Form::text("submit", $object->submit ?? _i("Send")) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup("email", _i('Email to')) !!}
{!! Form::email("email") !!}
{!! Form::closeGroup() !!}

<?php
$types = [
    'text' => _i("Text"),
    'textarea' => _i("Paragraph"),
    'number' => _i("Number"),
    'tel' => _i("Phone"),
    'email' => _i("Email"),
    'url' => _i("URL"),
    'date' => _i("Date"),
    'time' => _i("Time"),
    //'datetime' => _i("Datetime"),
    'datetimeLocal' => _i("Datetime"),
    'color' => _i("Color"),
    'select' => _i("Dropdown list"),
    //'radio' => _i("Radio"),
    //'checkbox' => _i("Checkbox"),
    'radios' => _i("Multiple choices"),
    'checkboxes' => _i("Checkboxes"),
    //'selectRange' => _i("Range"),
    //'password' => _i("Password"),
    'html' => _i("HTML"),
    'newsletter' => _i("Newsletter"),
];
?>

{!! Form::hidden('fields', null, ['id' => 'fields']) !!}

<fieldset id="add-field">
    <legend>{{ _i("Add field") }}</legend>
    @foreach($types as $type => $label)
        <button type="button" class="btn btn-secondary btn-sm mb-1" data-type="{{ $type }}">{{ $label }}</button>
    @endforeach
</fieldset>

<div id="preview" class="my-3"></div>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@push('scripts')
    <script>
        $(function () {
            const previewUrl = '{{ route('admin.forms.preview') }}';
            let $preview = $('#preview');
            let $fields = $('#fields');
            let fields = $fields.val().length ? JSON.parse($fields.val()) : [];

            if (fields.length) {
                previewForm();
            }

            function previewForm () {
                tinymce.remove(window.tinymceInitSettings.selector);

                $.post(previewUrl, {fields: fields, submit: $('#submit').val()}).done(function (data) {
                    $preview.html(data);

                    Sortable.create(document.querySelector('#preview .card-body'), {
                        handle: '.sortable-handle',
                        draggable: '.draggable',
                        animation: 150,
                        onChoose: function () {
                            tinymce.remove(window.tinymceInitSettings.selector);
                        },
                        onEnd: function () {
                            tinymce.init(window.tinymceInitSettings);
                            updateSort();
                        }
                    });

                    tinymce.init(window.tinymceInitSettings);
                });
            }

            function updateFields () {
                $fields.val(JSON.stringify(fields));
            }

            function updateSort () {
                $preview.find('input.sort').each(function (index) {
                    $(this).val(index);
                });
            }

            $preview.on('input', 'input, select', function () {
                fields[$(this).data('key')][$(this).data('attribute')] = $(this).val();
                updateFields();
            });

            $('#add-field button').click(function () {
                fields.push({type: $(this).data('type'), label: $(this).text()});
                updateFields();
                previewForm();
            });

            $preview.on('click', 'button[data-delete]', function () {
                fields.splice($(this).data('delete'), 1);
                updateFields();
                updateSort();
                previewForm();
            });
        });
    </script>
@endpush