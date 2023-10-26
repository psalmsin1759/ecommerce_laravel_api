<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOrderRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'payment_method' => 'required|string',
            'total_price' => 'required|numeric',
            'status' => 'required|string',
            'currency' => 'string',
            'shipping_price' => 'numeric',
            'shipping_address' => 'string',
            'shipping_city' => 'string',
            'shipping_state' => 'string',
            'shipping_country' => 'string',
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

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'payment_method.required' => 'The payment method field is required.',
            'total_price.required' => 'The total price field is required.',
            'total_price.numeric' => 'The total price must be a numeric value.',
            'status.required' => 'The status field is required.',
            'currency.string' => 'The currency must be a string.',
            'shipping_price.numeric' => 'The shipping price must be a numeric value.',
            'shipping_address.string' => 'The shipping address must be a string.',
            'shipping_city.string' => 'The shipping city must be a string.',
            'shipping_state.string' => 'The shipping state must be a string.',
            'shipping_country.string' => 'The shipping country must be a string.',
        ];
    }
}
