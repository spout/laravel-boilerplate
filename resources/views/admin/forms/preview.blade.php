<div class="card">
    <div class="card-header">{{ _i("Form preview") }}</div>
    <div class="card-body">
        <?php
        foreach ($fields ?? [] as $name => $field) {
            $name = "field_{$name}";
            $type = $field['type'];
            $label = $field['label'] ?? null;
            $value = $field['value'] ?? null;
            $options = $field['options'] ?? [];

            echo '<div class="row">';
            echo '<div class="col-sm-11">';
            echo '<div class="form-group">';
            echo '<div class="form-inline">';
            echo Form::text('labels[]', $label, ['class' => 'form-control-sm mb-1']);
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
                    echo Form::{$type}($name, $value, $options);
                    break;

                case 'password':
                    echo Form::password($name, $options);
                    break;

                case 'select':
                    //echo Form::select($name, $field['list'] ?? [], $field['selected'] ?? null, $field['selectAttributes'] ?? [], $field['optionsAttributes'] ?? []);
                    $list = $field['list'] ?? [_i("Option %d", 1), ''];
                    foreach ($list as $value => $label) {
                        echo '<div class="form-inline ml-3">';
                        echo Form::text("{$name}[]", $label, ['placeholder' => _i("Add option"), 'class' => 'form-control-sm mb-1']);
                        echo '</div>';
                    }
                    break;

                case 'selectRange':
                    echo Form::selectRange($name, $field['begin'], $field['end'], $field['selected'] ?? null, $options);
                    break;

                case 'radio':
                case 'checkbox':
                    echo Form::{$type}($name, $value, $field['label'] ?? null, $field['checked'] ?? null, $options);
                    break;

                case 'radios':
                case 'checkboxes':
                    $types = ['radios' => 'radio', 'checkboxes' => 'checkbox'];
                    $list = $field['list'] ?? [_i("Option %d", 1), ''];
                    foreach ($list as $value => $label) {
                        echo '<div class="form-inline">';
                        echo Form::{$types[$type]}("{$name}[]", $value, null, null, $options);
                        echo Form::text("{$name}[]", $label, ['placeholder' => _i("Add option"), 'class' => 'form-control-sm mb-1']);
                        echo '</div>';
                    }
                    break;
            }

            echo '</div>';
            echo '</div>';
            echo '<div class="col-sm-1">';
            echo '';
            echo '</div>';
            echo '</div>';
        }

        echo Form::submit(request()->input('submit', _i("Send")), ['class' => 'btn btn-primary']);
        ?>
    </div>
</div>