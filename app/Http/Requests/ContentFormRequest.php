<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentFormRequest extends FormRequest
{
    protected $fields = [
        'title' => 'required',
        //'slug' => 'required',
        'path' => [
            'required',
            'regex:/[a-z0-9-\/]+/'
        ],
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $locales = \Config::get('app.locales');

        foreach ($this->fields as $field => $rule) {
            foreach ($locales as $lang => $locale) {
                $rules["{$field}_{$lang}"] = $rule;
            }
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];
        foreach (\Config::get('app.locales', []) as $lang => $locale) {
            $messages["title_{$lang}.required"] = _i("The title (%s) is required.", $lang);
            $messages["path_{$lang}.required"] = _i("The path (%s) is required.", $lang);
            $messages["path_{$lang}.regex"] = _i("The slug must contain only alphanumeric characters and slashes.");
        }

        return $messages;
    }
}
