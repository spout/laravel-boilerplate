<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RedirectionFormRequest extends FormRequest
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
            'domain' => 'required',
            'url' => 'required',
            'destination' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'domain.required' => _i("The domain is required"),
            'url.required' => _i("The URL is required"),
            'destination.required' => _i("The destination is required"),
        ];
    }
}
