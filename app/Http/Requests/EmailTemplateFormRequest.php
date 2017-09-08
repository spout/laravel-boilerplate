<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailTemplateFormRequest extends FormRequest
{
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
        return [
            'to' => 'required',
            'subject' => 'required',
            'template' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'to.required' => _i("The to field is required."),
            'subject.required' => _i("The subject is required."),
            'template.required' => _i("The template is required."),
        ];
    }
}
