<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteFormRequest extends FormRequest
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
            'slug' => 'required',
            'domain' => 'required',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'slug.required' => _i("The slug is required"),
            'domain.required' => _i("The domain is required"),
            'name.required' => _i("The name is required"),
        ];
    }
}
