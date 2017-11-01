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
            'professional_customer_name' => 'required',
            'provider' => 'required',
            'type' => 'required',
            'order_number' => 'required',
            'professional_email' => 'nullable|email',
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'nullable|email',
            'construction_site_address' => 'required',
            'description' => 'required',
            'photo' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'professional_customer_name.required' => _i("The professional customer name is required."),
            'provider.required' => _i("The provider is required."),
            'type.required' => _i("The frame type is required."),
            'order_number.required' => _i("The initial order number is required."),
            'professional_email.email' => _i("The professional email isn't valid."),
            'customer_name.required' => _i("The customer name is required."),
            'customer_phone.required' => _i("The customer phone is required."),
            'customer_email.email' => _i("The professional email isn't valid."),
            'construction_site_address.required' => _i("The construction site address is required."),
            'description.required' => _i("The problem description is required."),
            'photo.required' => _i("The photo is required."),
            'photo.image' => _i("The photo isn't a valid image."),
        ];
    }
}
