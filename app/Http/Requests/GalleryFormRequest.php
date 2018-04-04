<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryFormRequest extends FormRequest
{
    protected $rules = [
        //'title' => 'required',
    ];

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];
        $locales = config('app.locales');

        foreach ($this->rules as $field => $rule) {
            foreach ($locales as $lang => $locale) {
                $rules["{$field}_{$lang}"] = $rule;
            }
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];
        foreach (config('app.locales', []) as $lang => $locale) {
            $messages["title_{$lang}.required"] = _i("The title (%s) is required.", $lang);
        }

        return $messages;
    }
}
