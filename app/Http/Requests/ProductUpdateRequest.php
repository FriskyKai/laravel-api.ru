<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends ApiRequest
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
            'name' => 'string',
            'brand' => 'string',
            'price' => 'numeric|between:0,999999.99',
            'quantity' => 'integer|min:0|regex:/^[1-9]+$/u',
            'description' => 'string',
            'is_featured' => 'boolean',
            'category_id' => 'integer|min:0',
        ];
    }
}
