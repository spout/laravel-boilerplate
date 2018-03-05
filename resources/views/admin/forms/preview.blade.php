<div class="card">
    <div class="card-header">{{ _i("Form preview") }}</div>
    <div class="card-body">
        <?php
        $defaultOptions = [
            'textarea' => ['rows' => 3],
        ];

        foreach ($fields ?? [] as $key => $field) {
            $type = $field['type'];
            $label = $field['label'] ?? null;
            $value = $field['value'] ?? null;
            $options = $field['options'] ?? [];

            if (!empty($defaultOptions[$type])) {
                $options = array_merge($defaultOptions[$type], $options);
            }

            echo '<div class="draggable">';
            echo Form::hidden("fields[{$key}][type]", $type);
            echo Form::hidden("fields[{$key}][id]", $field['id'] ?? null);
            echo Form::hidden("fields[{$key}][sort]", $field['sort'] ?? $key, ['class' => 'sort']);

            echo '<div class="row">';
            echo '<div class="col-sm-10">';

            if ($type === 'html') {
                echo Form::openGroup("fields[{$key}][html]", _i("HTML"));
                echo Form::textarea("fields[{$key}][html]", $field['html'] ?? null, ['class' => 'wysiwyg', 'rows' => 3]);
                echo Form::closeGroup();
            } else {
                echo '<div class="form-group">';
                echo '<div class="form-inline">';
                echo Form::text("fields[{$key}][label]", $label, ['class' => 'form-control-sm mb-1', 'data-key' => $key, 'data-attribute' => 'label']);
                echo Form::checkbox("fields[{$key}][options][required]", 1, _i("required"), $field['options']['required'] ?? null, ['class' => 'mx-1']);
                echo '</div>';

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
                        echo Form::{$type}("fields[{$key}][value]", $value, $options);
                        break;

                    case 'password':
                        echo Form::password($key, $options);
                        break;

                    case 'select':
                        $list = $field['list'] ?? [_i("Option %d", 1), ''];
                        foreach ($list as $value => $label) {
                            echo '<div class="form-inline ml-3">';
                            echo Form::text("fields[{$key}][value]", $label, ['placeholder' => _i("Add option"), 'class' => 'form-control-sm mb-1']);
                            echo '</div>';
                        }
                        break;

                    case 'selectRange':
                        echo Form::selectRange("fields[{$key}][value]", $field['begin'], $field['end'], $field['selected'] ?? null, $options);
                        break;

                    case 'radio':
                    case 'checkbox':
                        echo Form::{$type}($key, $value, $field['label'] ?? null, $field['checked'] ?? null, $options);
                        break;

                    case 'radios':
                    case 'checkboxes':
                        $types = ['radios' => 'radio', 'checkboxes' => 'checkbox'];
                        $list = $field['list'] ?? [_i("Option %d", 1), ''];
                        foreach ($list as $value => $label) {
                            echo '<div class="form-inline">';
                            echo Form::{$types[$type]}("{$key}[]", $value, null, null, $options);
                            echo Form::text("fields[{$key}][list][]", $label, ['placeholder' => _i("Add option"), 'class' => 'form-control-sm mb-1']);
                            echo '</div>';
                        }
                        break;
                }

                echo '</div>';
            }

            echo '</div>';
            echo '<div class="col-sm-2">';
            echo '<button type="button" class="btn btn-secondary btn-sm sortable-handle" style="cursor: move"><i class="fa fa-arrows"></i></button> ';
            echo '<button type="button" class="btn btn-danger btn-sm" data-delete="' . $key . '"><i class="fa fa-trash"></i></button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>