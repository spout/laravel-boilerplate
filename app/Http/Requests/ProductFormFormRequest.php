<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'forms.0' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'forms.0.required' => _i("The form is required."),
        ];
    }
}
