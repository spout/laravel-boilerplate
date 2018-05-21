<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function fields()
    {
        return [
            'name' => [
                'rule' => 'required',
                'message' => _i("The name (%s) is required."),
            ],
        ];
    }

    public function rules()
    {
        $rules = [
            'category_id' => 'required',
        ];

        foreach ($this->fields() as $field => $params) {
            foreach (config('app.locales') as $lang => $locale) {
                $rules["{$field}_{$lang}"] = $params['rule'];
            }
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'category_id.required' => _i("The category is required."),
        ];

        foreach ($this->fields() as $field => $params) {
            foreach (config('app.locales') as $lang => $locale) {
                $messages["{$field}_{$lang}.{$params['rule']}"] = sprintf($params['message'], $lang);
            }
        }

        return $messages;
    }
}
