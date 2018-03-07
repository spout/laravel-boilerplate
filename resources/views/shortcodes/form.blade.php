<?php
echo Form::open(['files' => true, 'novalidate' => true, 'route' => 'forms.store']);

echo Form::hidden('form_id', $form->id);

foreach ($form->fields as $field) {
    $name = $field->name;
    $type = $field->type;
    $label = $field->label ?? null;
    $value = $field->value ?? null;
    $options = [];

    if ($type === 'html') {
        echo '<div class="form-field-html">' . $field->html . '</div>';
    } else {
        echo Form::openGroup($name, $label);

        switch ($type) {
            case 'text':
            case 'textarea':
            case 'number':
            case 'tel':
            case 'email':
            case 'url':
            case 'date':
            case 'time':
            case 'datetime':
            case 'datetimeLocal':
            case 'color':
                echo Form::{$type}($name, $value, $options);
                break;

            case 'file':
                echo Form::file($name, $options);
                break;

            case 'password':
                echo Form::password($name, $options);
                break;

            case 'select':
                echo Form::select($name, array_merge(['' => '-'], array_combine($field->list, $field->list)));
                break;

            case 'radio':
            case 'checkbox':
                echo Form::{$type}($name, $value, $field->label ?? null, $field->checked ?? null, $options);
                break;

            case 'radios':
            case 'checkboxes':
                $types = ['radios' => 'radio', 'checkboxes' => 'checkbox'];
                $list = $field->list ?? [];
                foreach ($list as $value => $label) {
                    echo Form::{$types[$type]}("{$name}[]", $value, $label, null, $options);
                }
                break;
        }

        echo Form::closeGroup();
    }
}

echo Form::submit($form->submit, ['class' => 'btn btn-primary']);
echo Form::close();