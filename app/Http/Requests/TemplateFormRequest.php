<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemplateFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'slug' => 'required',
            'template' => [
                'required_without:template_file',
            ],
            'template_file' => [
                'required_without:template',
            ],
        ];
    }

    public function messages()
    {
        return [
            'slug.required' => _i("The slug is required."),
            'template.required_without' => _i("The template is required if template file isn't filled."),
            'template_file.required_without' => _i("The template file is required if template isn't filled."),
        ];
    }
}
