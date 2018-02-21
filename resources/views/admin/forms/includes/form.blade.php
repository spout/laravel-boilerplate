{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.forms.store'] : ['admin.forms.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup("title", _i('Title')) !!}
{!! Form::text("title") !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup("email", _i('Email to')) !!}
{!! Form::email("email") !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup("submit", _i('Submit button label')) !!}
{!! Form::text("submit", $object->submit ?? _i("Send")) !!}
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
];
?>

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
            let fields = [];

            function previewForm () {
                $.post(previewUrl, {fields: fields, submit: $('#submit').val()}).done(function (data) {
                    $('#preview').html(data);
                });
            }

            $('#add-field button').click(function () {
                fields.push({type: $(this).data('type'), label: $(this).text()});
                previewForm();
            });

            $('#submit').change(function () {
                previewForm();
            });

            /*let ajaxData = {
                fields: [
                    {type: 'text', label: 'Text'},
                    {type: 'textarea', label: 'Textarea'},
                    {type: 'number', label: 'Number'},
                    {type: 'tel', label: 'Tel'},
                    {type: 'email', label: 'Email'},
                    {type: 'url', label: 'URL'},
                    {type: 'date', label: 'Date'},
                    {type: 'time', label: 'Time'},
                    {type: 'datetime', label: 'Datetime'},
                    {type: 'datetimeLocal', label: 'Datetime local'},
                    {type: 'color', label: 'Color'},
                    {type: 'select', label: 'Select', list: ['foo', 'bar', 'baz']},
                    {type: 'radio', label: 'Radio'},
                    {type: 'checkbox', label: 'Checkbox label'},
                    {type: 'radios', label: 'Radio multiple', list: ['foo', 'bar', 'baz']},
                    {type: 'checkboxes', label: 'Checkbox multiple', list: ['foo', 'bar', 'baz']},
                    {type: 'selectRange', label: 'Select range', begin: 1, end: 10},
                    {type: 'password', label: 'Password'},
                ]
            };*/
        });
    </script>
@endpush