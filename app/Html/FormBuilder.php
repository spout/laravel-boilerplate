<?php

namespace App\Html;

use Collective\Html\FormBuilder as CollectiveFormBuilder;

/**
 * Class FormBuilder
 * @package App\Html
 *
 * @link http://blog.stidges.com/post/easy-bootstrap-forms-in-laravel
 * @link https://github.com/manavo/laravel-bootstrap-forms
 */
class FormBuilder extends CollectiveFormBuilder
{

    /**
     * An array containing the currently opened form groups.
     *
     * @var array
     */
    protected $groupStack = [];

    /**
     * An array containing the options of the currently open form groups.
     *
     * @var array
     */
    protected $groupOptions = [];

    /**
     * Open a new form group.
     *
     * @param  string $name
     * @param  mixed $label
     * @param  array $options
     * @param  array $labelOptions
     *
     * @return string
     */
    public function openGroup($name, $label = null, $options = [], $labelOptions = []) {
        $options = $this->appendClassToOptions('form-group', $options);

        // Append the name of the group to the groupStack.
        $this->groupStack[] = $name;

        $this->groupOptions[] = $options;

        // Check to see if error blocks are enabled
        if ($this->errorBlockEnabled($options)) {
            if ($this->hasErrors($name)) {
                // If the form element with the given name has any errors,
                // apply the 'has-error' class to the group.
                $options = $this->appendClassToOptions('has-error', $options);
            }
        }

        // If a label is given, we set it up here. Otherwise, we will just
        // set it to an empty string.
        $label = $label ? $this->label($name, $label, $labelOptions) : '';

        $attributes = [];
        foreach ($options as $key => $value) {
            if (!in_array($key, ['errorBlock'])) {
                $attributes[$key] = $value;
            }
        }

        return '<div' . $this->html->attributes($attributes) . '>' . $label;
    }

    /**
     * Close out the last opened form group.
     *
     * @return string
     */
    public function closeGroup()
    {
        // Get the last added name from the groupStack and
        // remove it from the array.
        $name = array_pop($this->groupStack);

        // Get the last added options to the groupOptions
        // This way we can check if error blocks were enabled
        $options = array_pop($this->groupOptions);

        // Check to see if we are to include the formatted help block
        if ($this->errorBlockEnabled($options)) {
            // Get the formatted errors for this form group.
            $errors = $this->getFormattedErrors($name);
        }

        // Append the errors to the group and close it out.
        return $errors . '</div>';
    }

    /**
     * Create a form input field.
     *
     * @param  string $type
     * @param  string $name
     * @param  string $value
     * @param  array $options
     *
     * @return string
     */
    public function input($type, $name, $value = null, $options = [])
    {
        // Don't add form-control for some input types (like submit, checkbox, radio)
        if (!in_array($type, ['submit', 'checkbox', 'radio', 'reset', 'file'])) {
            $options = $this->appendClassToOptions('form-control', $options);
        } else {
            if (in_array($type, ['submit', 'reset'])) {
                $options = $this->appendClassToOptions('btn', $options);
            }
        }

        if ($this->hasErrors($name)) {
            $options = $this->appendClassToOptions('is-invalid', $options);
        }

        // Call the parent input method so that Laravel can handle
        // the rest of the input set up.
        return parent::input($type, $name, $value, $options);
    }

    /**
     * Create a select box field.
     *
     * @param string $name
     * @param array $list
     * @param null $selected
     * @param array $selectAttributes
     * @param array $optionsAttributes
     * @param array $optgroupsAttributes
     * @return \Illuminate\Support\HtmlString
     */
    public function select($name, $list = [], $selected = null, array $selectAttributes = [], array $optionsAttributes = [], array $optgroupsAttributes = [])
    {
        $selectAttributes = $this->appendClassToOptions('form-control', $selectAttributes);

        if ($this->hasErrors($name)) {
            $selectAttributes = $this->appendClassToOptions('is-invalid', $selectAttributes);
        }

        // Call the parent select method so that Laravel can handle
        // the rest of the select set up.
        return parent::select($name, $list, $selected, $selectAttributes, $optionsAttributes, $optgroupsAttributes);
    }

    /**
     * Create a plain form input field.
     *
     * @param  string $type
     * @param  string $name
     * @param  string $value
     * @param  array $options
     *
     * @return string
     */
    public function plainInput($type, $name, $value = null, $options = [])
    {
        return parent::input($type, $name, $value, $options);
    }

    /**
     * Create a plain select box field.
     *
     * @param  string $name
     * @param  array $list
     * @param  string $selected
     * @param  array $options
     *
     * @return string
     */
    public function plainSelect(
        $name,
        $list = [],
        $selected = null,
        $options = []
    ) {
        return parent::select($name, $list, $selected, $options);
    }

    /**
     * Create a checkable input field.
     *
     * @param  string $type
     * @param  string $name
     * @param  mixed $value
     * @param  bool $checked
     * @param  array $options
     *
     * @return string
     */
    protected function checkable($type, $name, $value, $checked, $options)
    {
        $checked = $this->getCheckedState($type, $name, $value, $checked);

        if ($checked) {
            $options['checked'] = 'checked';
        }

        return parent::input($type, $name, $value, $options);
    }

    /**
     * Create a checkbox input field.
     *
     * @param string $name
     * @param int $value
     * @param null $label
     * @param null $checked
     * @param array $options
     * @return \Illuminate\Support\HtmlString|string
     */
    public function checkbox(
        $name,
        $value = 1,
        $label = null,
        $checked = null,
        $options = []
    ) {
        $class = 'form-check-input';
        $class .= empty($label) ? ' position-static' : '';
        $id = str_slug("{$name}_{$value}");
        $checkable = parent::checkbox($name, $value, $checked, array_merge(compact('class', 'id'), $options));

        return $this->wrapCheckable($checkable, $id, $label);
    }

    /**
     * Create a radio button input field.
     *
     * @param  string $name
     * @param  mixed $value
     * @param  mixed $label
     * @param  bool $checked
     * @param  array $options
     *
     * @return string
     */
    public function radio(
        $name,
        $value = null,
        $label = null,
        $checked = null,
        $options = []
    ) {
        $class = 'form-check-input';
        $class .= empty($label) ? ' position-static' : '';
        $id = str_slug("{$name}_{$value}");
        $checkable = parent::radio($name, $value, $checked, array_merge(compact('class', 'id'), $options));

        return $this->wrapCheckable($checkable, $id, $label);
    }

    /**
     * Create an inline checkbox input field.
     *
     * @param  string $name
     * @param  mixed $value
     * @param  mixed $label
     * @param  bool $checked
     * @param  array $options
     *
     * @return string
     */
    public function inlineCheckbox(
        $name,
        $value = 1,
        $label = null,
        $checked = null,
        $options = []
    ) {
        $class = 'form-check-input';
        $class .= empty($label) ? ' position-static' : '';
        $id = str_slug("{$name}_{$value}");
        $checkable = parent::checkbox($name, $value, $checked, array_merge(compact('class', 'id'), $options));

        return $this->wrapInlineCheckable($checkable, $id, $label);
    }

    /**
     * Create an inline radio button input field.
     *
     * @param  string $name
     * @param  mixed $value
     * @param  mixed $label
     * @param  bool $checked
     * @param  array $options
     *
     * @return string
     */
    public function inlineRadio($name, $value = null, $label = null, $checked = null, $options = []) {
        $class = 'form-check-input';
        $class .= empty($label) ? ' position-static' : '';
        $id = str_slug("{$name}_{$value}");
        $checkable = parent::radio($name, $value, $checked, array_merge(compact('class', 'id'), $options));

        return $this->wrapInlineCheckable($checkable, $id, $label);
    }

    /**
     * Create a textarea input field.
     *
     * @param  string $name
     * @param  string $value
     * @param  array $options
     *
     * @return string
     */
    public function textarea($name, $value = null, $options = [])
    {
        $options = $this->appendClassToOptions('form-control', $options);

        if ($this->hasErrors($name)) {
            $options = $this->appendClassToOptions('is-invalid', $options);
        }

        return parent::textarea($name, $value, $options);
    }

    /**
     * Create a plain textarea input field.
     *
     * @param  string $name
     * @param  string $value
     * @param  array $options
     *
     * @return string
     */
    public function plainTextarea($name, $value = null, $options = [])
    {
        return parent::textarea($name, $value, $options);
    }

    /**
     * Create a range input field
     *
     * @param $name
     * @param null $value
     * @param $options
     * @return \Illuminate\Support\HtmlString
     */
    public function range($name, $value = null, $options)
    {
        $options = $this->appendClassToOptions('form-control', $options);

        return parent::input('range', $name, $value, $options);
    }

    /**
     * Create a button element.
     *
     * @param  string $value
     * @param  array $options
     * @return string
     */
    public function button($value = null, $options = array())
    {
        $options = $this->appendClassToOptions('btn', $options);

        return parent::button($value, $options);
    }

    /**
     * Append the given class to the given options array.
     *
     * @param  string $class
     * @param  array $options
     *
     * @return array
     */
    private function appendClassToOptions($class, array $options = [])
    {
        // If a 'class' is already specified, append the 'form-control'
        // class to it. Otherwise, set the 'class' to 'form-control'.
        $options['class'] = isset($options['class']) ? $options['class'] . ' '
            : '';
        $options['class'] .= $class;

        return $options;
    }

    /**
     * Determine whether the form element with the given name
     * has any validation errors.
     *
     * @param  string $name
     *
     * @return bool
     */
    private function hasErrors($name)
    {
        if (is_null($this->session) || !$this->session->has('errors')) {
            // If the session is not set, or the session doesn't contain
            // any errors, the form element does not have any errors
            // applied to it.
            return false;
        }

        // Get the errors from the session.
        $errors = $this->session->get('errors');

        // Check if the errors contain the form element with the given name.
        // This leverages Laravel's transformKey method to handle the
        // formatting of the form element's name.
        return $errors->has($this->transformKey($name));
    }

    /**
     * Get the formatted errors for the form element with the given name.
     *
     * @param  string $name
     *
     * @return string
     */
    private function getFormattedErrors($name)
    {
        if (!$this->hasErrors($name)) {
            // If the form element does not have any errors, return
            // an emptry string.
            return '';
        }

        // Get the errors from the session.
        $errors = $this->session->get('errors');

        // Return the formatted error message, if the form element has any.
        return $errors->first($this->transformKey($name), '<p class="invalid-feedback">:message</p>');
    }

    /**
     * Wrap the given checkable in the necessary wrappers.
     *
     * @param $checkable
     * @param $for
     * @param $label
     * @return string
     */
    private function wrapCheckable($checkable, $for, $label)
    {
        $checkable .= empty($label) ? '' : parent::label($for, $label, ['class' => 'form-check-label']);
        return '<div class="form-check">' . $checkable . '</div>';
    }

    /**
     * Wrap the given checkable in the necessary inline wrappers.
     *
     * @param $checkable
     * @param $for
     * @param $label
     * @return string
     */
    private function wrapInlineCheckable($checkable, $for, $label)
    {
        $checkable .= empty($label) ? '' : parent::label($for, $label, ['class' => 'form-check-label']);
        return '<div class="form-check form-check-inline">' . $checkable . '</div>';
    }

    /**
     * errorBlockEnabled
     *
     * @param array $options
     *
     * @return bool
     * @version v1.0
     */
    private function errorBlockEnabled($options = [])
    {
        // Check to see if errorBlock key exists
        if (array_key_exists("errorBlock", $options)) {
            // Return the value from the array
            return $options["errorBlock"];
        }

        // Default to true if it does not exist
        return true;
    }
}