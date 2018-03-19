<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyFormRequest extends FormRequest
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
            'code' => 'required',
            'name' => 'required',
            'symbol' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => _i("The code is required"),
            'name.required' => _i("The name is required"),
            'symbol.required' => _i("The symbol is required"),
        ];
    }
}
