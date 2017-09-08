<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventTemplateFormRequest extends FormRequest
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
            'template' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'color' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'template.required' => _i("The template is required."),
            'time_start.required' => _i("The start time is required."),
            'time_end.required' => _i("The end time is required."),
            'color.required' => _i("The color is required."),
        ];
    }
}
