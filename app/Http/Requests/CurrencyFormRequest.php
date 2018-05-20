<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required',
            'name' => 'required',
            'symbol' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => _i("The code is required."),
            'name.required' => _i("The name is required."),
            'symbol.required' => _i("The symbol is required."),
        ];
    }
}
