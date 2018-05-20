<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'url' => [
                'required',
                'url',
            ],
        ];
    }

    public function messages()
    {
        return [
            'url.required' => _i("The URL is required."),
            'url.url' => _i("The URL is invalid."),
        ];
    }
}
