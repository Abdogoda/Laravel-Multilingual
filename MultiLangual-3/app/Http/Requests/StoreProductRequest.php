<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name.en' => 'required|string',
            'name.ar' => 'required|string',
            'name.fr' => 'required|string',
            'category.en' => 'required|string',
            'category.ar' => 'required|string',
            'category.fr' => 'required|string',
            'price' => 'required|numeric',
        ];
    }
}