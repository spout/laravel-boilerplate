<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SnippetFormRequest extends FormRequest
{
    protected $fields = [
        'title' => 'required',
        'content' => 'required',
    ];

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'slug' => 'required',
        ];
        $locales = config('app.locales');

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
        $locales = config('app.locales');

        foreach ($this->fields as $field => $rule) {
            foreach ($locales as $lang => $locale) {
                switch ($field) {
                    case 'title':
                        $message = _i("The title (%s) is required.", $lang);
                        break;

                    case 'content':
                        $message = _i("The content (%s) is required.", $lang);
                        break;

                    default:
                        $message = _i("This field is required.");
                        break;
                }

                $messages["{$field}_{$lang}.required"] = $message;
            }
        }

        return $messages;
    }
}
