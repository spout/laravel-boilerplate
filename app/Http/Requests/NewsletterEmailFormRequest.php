<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterEmailFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => _i("The email is required."),
        ];
    }
}
