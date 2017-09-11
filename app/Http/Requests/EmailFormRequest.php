<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailFormRequest extends FormRequest
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
            'email_type' => 'required',
            'to' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'property_type_id.required' => _i("The property type is required."),
            'email_type.required' => _i("The email type is required."),
            'to.required' => _i("The to field is required."),
            'to.email' => _i("The to field is not a valid email."),
            'subject.required' => _i("The subject is required."),
            'message.required' => _i("The message is required."),
        ];
    }
}
