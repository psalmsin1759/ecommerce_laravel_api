<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryMethodRequest extends FormRequest
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
            "name" => "required|string",
            "description" => "required|string",
            "amount" => "required|numeric"
        ];
    }

    public function message(){
        return [
            "name.required" => "Name is required",
            "description.required" => "Description is required",
            "amount.required" => "Amount is required",
            "amount.numeric" => "Amount must be a number"
        ];
    }
}
