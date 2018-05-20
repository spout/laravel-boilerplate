<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'slug' => 'required',
            'domain' => 'required',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'slug.required' => _i("The slug is required."),
            'domain.required' => _i("The domain is required."),
            'name.required' => _i("The name is required."),
        ];
    }
}
