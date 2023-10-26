<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\Product;

class StoreProductRequest extends FormRequest
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
        //return Product::validationRules();
        return [
            'name' => 'required|string',
            'sku' => 'required|string|unique:products',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discounted_price' => 'numeric|min:0',
            'status' => 'required|in:Selling,Not Selling Yet',
            'featured' => 'required|boolean',
            'new_arrival' => 'required|boolean',
            'sort_order' => 'required|integer|min:0',
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
            'name.required' => 'The product name is required.',
            'sku.required' => 'The product SKU is required.',
            'sku.unique' => 'The product SKU must be unique.',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 0.',
            
            'description.string' => 'The description must be a string.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
            'discounted_price.numeric' => 'The discounted price must be a number.',
            'discounted_price.min' => 'The discounted price must be at least 0.',
            
            'status.required' => 'The status is required.',
            'status.in' => 'Invalid status. It must be "Selling" or "Not Selling Yet".',
            'featured.required' => 'The featured status is required.',
            'featured.boolean' => 'The featured status must be a boolean (true or false).',
            'new_arrival.required' => 'The new arrival status is required.',
            'new_arrival.boolean' => 'The new arrival status must be a boolean (true or false).',
            'sort_order.required' => 'The sort order is required.',
            'sort_order.integer' => 'The sort order must be an integer.',
            'sort_order.min' => 'The sort order must be at least 0.',
        ];
    }
}
