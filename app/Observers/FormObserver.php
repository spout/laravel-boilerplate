<?php

namespace App\Observers;

use App\Models\Form;
use App\Models\FormField;

class FormObserver
{
    public function saving(Form $form)
    {
        unset($form->fields);
    }

    public function saved(Form $form)
    {
        // Delete all associated fields
        FormField::where('form_id', $form->id)->delete();

        // Create all fields
        foreach (request()->input('fields', []) as $k => $field) {
            FormField::create([
                'form_id' => $form->id,
                'type' => $field['type'],
                'label' => $field['label'] ?? null,
                'options' => $field['options'] ?? null,
                'html' => $field['html'] ?? null,
                'sort' => $field['sort'],
            ]);
        }
    }
}