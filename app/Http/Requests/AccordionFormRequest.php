<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccordionFormRequest extends FormRequest
{
    public function fields()
    {
        return [
            //'title' => [
            //    'rule' => 'required',
            //    'message' => _i("The title (%s) is required."),
            //],
            //'slug' => [
            //    'rule' => 'required',
            //    'message' => _i("The slug (%s) is required."),
            //],
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];

        foreach ($this->fields() as $field => $params) {
            foreach (config('app.locales') as $lang => $locale) {
                $rules["{$field}_{$lang}"] = $params['rule'];
            }
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];

        foreach ($this->fields() as $field => $params) {
            foreach (config('app.locales') as $lang => $locale) {
                $messages["{$field}_{$lang}.{$params['rule']}"] = sprintf($params['message'], $lang);
            }
        }

        return $messages;
    }
}
