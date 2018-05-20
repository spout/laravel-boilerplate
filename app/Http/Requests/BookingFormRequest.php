<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'lastname.required' => _i("The lastname is required."),
            'firstname.required' => _i("The firstname is required."),
            'email.required' => _i("The email is required."),
            'email.email' => _i("The email isn't valid."),
            'phone.required' => _i("The phone is required."),
            'message.required' => _i("The message is required."),
        ];
    }
}
