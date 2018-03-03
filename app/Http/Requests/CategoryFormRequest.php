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
}
