<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'orderid' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'sometimes|string|max:20',
            'payment_method' => 'required|string',
            'total_price' => 'required|numeric',
            'tax' => 'sometimes|numeric',
            'status' => 'required|string',
            'discount' => 'sometimes|numeric',
            'currency' => 'required|string',
            'shipping_price' => 'required|numeric',
            'shipping_address' => 'required|string',
            'shipping_postalcode' => 'sometimes',
            'shipping_city' => 'sometimes',
            'shipping_state' => 'required|string',
            'shipping_country' => 'required|string',
            'cart_items' => 'sometimes',
            'create_account' => 'sometimes|string',
            'password' => 'sometimes|string'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }


    public function messages()
    {
        return [
            'orderid.required' => 'The order ID is required',
            'first_name.required' => 'The first name is required.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.max' => 'The first name may not be greater than :max characters.',
    
            'last_name.required' => 'The last name is required.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.max' => 'The last name may not be greater than :max characters.',
    
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
    
            'phone.string' => 'The phone must be a string.',
            'phone.max' => 'The phone may not be greater than :max characters.',
    
            'payment_method.required' => 'The payment method is required.',
            'payment_method.string' => 'The payment method must be a string.',
    
            'total_price.required' => 'The total price is required.',
            'total_price.numeric' => 'The total price must be a number.',
    
            'tax.numeric' => 'The tax must be a number.',
    
            'status.required' => 'The status is required.',
            'status.string' => 'The status must be a string.',
    
            'discount.numeric' => 'The discount must be a number.',
    
            'currency.required' => 'The currency is required.',
            'currency.string' => 'The currency must be a string.',
    
            'shipping_price.required' => 'The shipping price is required.',
            'shipping_price.numeric' => 'The shipping price must be a number.',
    
            'shipping_address.required' => 'The shipping address is required.',
            'shipping_address.string' => 'The shipping address must be a string.',
    
            'shipping_postalcode.string' => 'The postal code must be a string.',
    
            'shipping_city.string' => 'The city must be a string.',
    
            'shipping_state.required' => 'The state is required.',
            'shipping_state.string' => 'The state must be a string.',
    
            'shipping_country.required' => 'The country is required.',
            'shipping_country.string' => 'The country must be a string.',
        ];
    }
}
