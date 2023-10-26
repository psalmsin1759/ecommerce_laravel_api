<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCouponRequest extends FormRequest
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
            'code' => 'required|unique:coupons,code|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|in:fixed,percentage',
            'value' => 'required|numeric|min:0',
            'status' => 'required|in:0,1',
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
            'code.required' => 'The coupon code is required.',
            'code.unique' => 'The coupon code has already been taken.',
            'code.max' => 'The coupon code must not exceed :max characters.',
            'start_date.required' => 'The start date is required.',
            'end_date.required' => 'The end date is required.',
            'end_date.after_or_equal' => 'The end date must be greater than or equal to the start date.',
            'type.required' => 'The coupon type is required.',
            'type.in' => 'Invalid coupon type. Choose either "fixed" or "percentage".',
            'value.required' => 'The coupon value is required.',
            'value.numeric' => 'The coupon value must be a numeric value.',
            'value.min' => 'The coupon value must be at least :min.',
            'status.required' => 'The coupon status is required.',
            'status.in' => 'Invalid coupon status. Choose either "0" or "1".',
        ];
    }
}
