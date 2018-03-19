<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_singular' => 'required',
            'slug_singular' => 'required',
            'title_plural' => 'required',
            'slug_plural' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title_singular.required' => _i("The title singular is required."),
            'slug_singular.required' => _i("The slug singular is required."),
            'title_plural.required' => _i("The title plural is required."),
            'slug_plural.required' => _i("The slug plural is required."),
        ];
    }
}
