<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventFormRequest extends FormRequest
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
            'date_start' => 'required',
            'date_end' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => _i("The title is required."),
            'date_start.required' => _i("The start date is required."),
            'date_end.required' => _i("The end date is required."),
        ];
    }
}
