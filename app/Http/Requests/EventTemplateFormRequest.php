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
            'title' => 'required',
            'template' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'color' => 'required',
        ];
    }
}
