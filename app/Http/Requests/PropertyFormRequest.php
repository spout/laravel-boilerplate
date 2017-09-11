<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            'property_type_id' => 'required',
            'ical_url' => 'required|url',
            'owner_email' => 'required|email',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'property_type_id.required' => _i("The property type is required."),
            'ical_url.required' => _i("The iCal URL is required."),
            'ical_url.url' => _i("The iCal URL is not a valid URL."),
            'owner_email.required' => _i("The owner email is required."),
            'owner_email.email' => _i("The owner email is not a valid email address."),
            'name.required' => _i("The name is required."),
        ];
    }
}
