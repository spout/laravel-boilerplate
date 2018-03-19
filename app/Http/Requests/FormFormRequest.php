<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormFormRequest extends FormRequest
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
            'subject' => 'required',
            'submit' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => _i("The title is required."),
            'subject.required' => _i("The subject is required."),
            'submit.required' => _i("The submit is required."),
        ];
    }
}
