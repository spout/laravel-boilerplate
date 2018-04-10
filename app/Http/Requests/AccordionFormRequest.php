<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccordionFormRequest extends FormRequest
{
    protected $fields = [
        //'title' => 'required',
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
        foreach (config('app.locales', []) as $lang => $locale) {
            $messages["title_{$lang}.required"] = _i("The title (%s) is required.", $lang);
        }

        return $messages;
    }
}
