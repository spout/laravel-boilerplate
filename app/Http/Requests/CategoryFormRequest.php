<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function fields()
    {
        return [
            'title_singular' => [
                'rule' => 'required',
                'message' => _i("The title singular (%s) is required."),
            ],
            'slug_singular' => [
                'rule' => 'required',
                'message' => _i("The slug singular (%s) is required."),
            ],
            'title_plural' => [
                'rule' => 'required',
                'message' => _i("The title plural (%s) is required."),
            ],
            'slug_plural' => [
                'rule' => 'required',
                'message' => _i("The slug plural (%s) is required."),
            ],
        ];
    }

    public function rules()
    {
        $category = $this->route()->parameter('category');

        $rules = [
            'marker_icon' => [
                'required',
                Rule::unique('categories')->ignore($category),
            ],
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
            'marker_icon.required' => _i("The marker icon is required."),
            'marker_icon.unique' => _i("The marker icon must be unique."),
        ];

        foreach ($this->fields() as $field => $params) {
            foreach (config('app.locales') as $lang => $locale) {
                $messages["{$field}_{$lang}.{$params['rule']}"] = sprintf($params['message'], $lang);
            }
        }

        return $messages;
    }
}
