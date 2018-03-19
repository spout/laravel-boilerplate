<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => _i("The title is required"),
            'content.required' => _i("The content is required"),
            'category_id.required' => _i("The category is required"),
        ];
    }
}
