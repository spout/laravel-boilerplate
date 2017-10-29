<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AfterSalesServiceFormRequest extends FormRequest
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
            'provider' => 'required',
            'order_number' => 'required',
            'position' => 'required',
            'description' => 'required',
            'photo' => 'required|image',
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'provider.required' => _i("The provider is required."),
            'order_number.required' => _i("The order number is required."),
            'position.required' => _i("The position is required."),
            'description.required' => _i("The description is required."),
            'photo.required' => _i("The photo is required."),
            'photo.image' => _i("The photo isn't a valid image."),
            'firstname.required' => _i("The firstname is required."),
            'lastname.required' => _i("The lastname is required."),
            'address.required' => _i("The address is required."),
            'phone.required' => _i("The phone is required."),
            'email.required' => _i("The email is required."),
            'email.email' => _i("The email isn't valid."),
        ];
    }
}
