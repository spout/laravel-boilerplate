<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'subject' => 'required',
            'submit' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => _i("The title is required."),
            'subject.required' => _i("The subject is required."),
            'submit.required' => _i("The submit button label is required."),
        ];
    }
}
