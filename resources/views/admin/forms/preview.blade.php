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
            $options = [];

            if (!empty($defaultOptions[$type])) {
                $options = array_merge($defaultOptions[$type], $options);
            }

            echo '<div class="draggable">';
            echo Form::hidden("fields[{$key}][type]", $type);
            echo Form::hidden("fields[{$key}][id]", $field['id'] ?? null);
            echo Form::hidden("fields[{$key}][sort]", $field['sort'] ?? $key, ['class' => 'sort']);

            echo '<div class="row">';
            echo '<div class="col-sm-10">';

            switch ($type) {
                case 'html':
                    echo Form::openGroup("fields[{$key}][html]", _i("HTML"));
                    echo Form::textarea("fields[{$key}][html]", $field['html'] ?? null, ['class' => 'wysiwyg', 'rows' => 3, 'style' => 'height: 100px']);
                    echo Form::closeGroup();
                    break;

                case 'newsletter':
                    $label = _i("Subscribe to newsletter?");
                    echo '<div class="form-group">';
                    echo Form::hidden("fields[{$key}][label]", $label);
                    echo Form::checkbox("fields[{$key}][value]", 1, $label, true);
                    echo '</div>';
                    break;

                default:
                    echo '<div class="form-group">';
                    echo '<div class="form-inline">';
                    echo Form::text("fields[{$key}][label]", $label, ['class' => 'form-control-sm mb-1', 'data-key' => $key, 'data-attribute' => 'label']);
                    echo Form::checkbox("fields[{$key}][required]", 1, _i("required"), $field['required'] ?? null, ['class' => 'mx-1']);
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

                        case 'firstname':
                        case 'lastname':
                            echo Form::text("fields[{$key}][value]", $value, $options);
                            break;

                        case 'file':
                            echo Form::file($key, $options);
                            break;

                        case 'password':
                            echo Form::password($key, $options);
                            break;

                        case 'select':
                            $list = array_merge($field['list'] ?? [], array_fill(0, 20, ''));
                            foreach ($list as $value => $label) {
                                echo '<div class="form-inline ml-3 d-none fields-list">';
                                echo Form::text("fields[{$key}][list][]", $label, ['placeholder' => _i("Add option"), 'class' => 'form-control-sm mb-1']);
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
                            $list = array_merge($field['list'] ?? [], array_fill(0, 20, ''));
                            foreach ($list as $value => $label) {
                                echo '<div class="form-inline d-none fields-list">';
                                echo Form::{$types[$type]}("fields[{$key}][{$type}][]", $value, null, null, $options);
                                echo Form::text("fields[{$key}][list][]", $label, ['placeholder' => _i("Add option"), 'class' => 'form-control-sm mb-1']);
                                echo '</div>';
                            }
                            break;
                    }

                    echo '</div>';

                    break;
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