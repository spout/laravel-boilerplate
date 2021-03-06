<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'required',
            'currency_code' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => _i("The product is required."),
            'currency_code.required' => _i("The currency is required."),
        ];
    }
}
