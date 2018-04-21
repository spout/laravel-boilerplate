<?php

namespace App\Observers;

use App\Models\Form;
use App\Models\FormField;

class FormObserver
{
    public function saved(Form $form)
    {
        // Delete all associated fields
        FormField::where('form_id', $form->id)->delete();

        // Create all fields
        foreach (request()->input('fields', []) as $k => $field) {
            $attributes = [
                'form_id' => $form->id,
                'type' => $field['type'],
                'label' => $field['label'] ?? null,
                'required' => $field['required'] ?? null,
                'list' => array_filter($field['list'] ?? []),
                'html' => $field['html'] ?? null,
                'sort' => $field['sort'],
            ];

            foreach (FormField::$translatableColumns as $column) {
                foreach (config('app.locales') as $lang => $locale) {
                    $attributes["{$column}_{$lang}"] = $field["{$column}_{$lang}"] ?? null;
                }
            }

            FormField::create($attributes);
        }
    }
}