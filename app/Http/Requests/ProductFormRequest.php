<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function fields()
    {
        return [
            'title' => [
                'rule' => 'required',
                'message' => _i("The title (%s) is required."),
            ],
            'slug' => [
                'rule' => 'required',
                'message' => _i("The slug (%s) is required."),
            ],
        ];
    }

    public function rules()
    {
        $rules = [
            'template_slug' => 'required',
            'featured_image' => 'required',
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
            'template_slug.required' => _i("The template is required."),
            'featured_image.required' => _i("The featured image is required."),
        ];

        foreach ($this->fields() as $field => $params) {
            foreach (config('app.locales') as $lang => $locale) {
                $messages["{$field}_{$lang}.{$params['rule']}"] = sprintf($params['message'], $lang);
            }
        }

        return $messages;
    }
}
