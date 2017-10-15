<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentFormRequest extends FormRequest
{
    protected $fields = [
        'title' => 'required',
        //'slug' => 'required',
        'path' => 'required',
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
        $locales = \Config::get('app.locales');

        foreach ($this->fields as $field => $rule) {
            foreach ($locales as $lang => $locale) {
                switch ($field) {
                    case 'title':
                        $message = _i("The title (%s) field is required.", $lang);
                        break;

                    case 'path':
                        $message = _i("The path (%s) field is required.", $lang);
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
