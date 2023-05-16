<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:80',
                Rule::unique('product_categories', 'name')
            ],
        ];
    }

    /**
     * Custom error messages
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.unique' => 'A categoria ":input" já está cadastrada'
        ];
    }
}
