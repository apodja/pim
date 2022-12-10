<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            '*.title' => 'required|string|max:255',
            '*.description' => 'nullable|string|min:10|max:1000',
            '*.sku' => 'required|string|min:5',
            '*.price' => 'required|numeric|min:0',
            '*.active' => 'boolean',
            '*.category' => 'string|nullable',
            '*.manufacturer'=> 'string|nullable',
            '*.hasVariants' => 'required|boolean',
            '*.quantity' => 'numeric|min:0',
            '*.attribute1' => 'nullable|string',
            '*.attribute2' => 'nullable|string',
            '*.attribute1_value' => 'nullable|string',
            '*.attribute2_value' => 'nullable|string'
        ];
    }
}
