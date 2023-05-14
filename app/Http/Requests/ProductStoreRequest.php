<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:13'],
            'category' => ['required', 'integer', 'min:1', 'max:5']
        ];
    }

    /**
     * Custom error messages
     * @return string[]
     */
    public function messages(): array
    {
        return [
          'category.min' => 'Selecione uma categoria.'
        ];
    }
}
