<?php

namespace App\Shortcodes;

use App\Models\Form;

class FormShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $form = Form::find($shortcode->id);

        if (empty($form)) {
            return _i("Form id: %d not found.", $shortcode->id);
        }

        return view('shortcodes.form', compact('shortcode', 'form'));
    }
}