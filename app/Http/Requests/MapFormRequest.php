<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lat' => 'required',
            'lng' => 'required',
            'zoom' => 'required',
            'map_type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'lat.required' => _i("The latitude is required."),
            'lng.required' => _i("The longitude is required."),
            'zoom.required' => _i("The zoom is required."),
            'map_type.required' => _i("The map type is required."),
        ];
    }
}
