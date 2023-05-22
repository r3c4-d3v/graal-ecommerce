<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourierStoreRequest extends FormRequest
{
    /**
     * Validation rules to courier.
     *
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'motorcycle_model' => ['required', 'string', 'max:100'],
            'license_plate' => ['required', 'string', 'min:5', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone' => ['required', 'string', 'max:20'],
            'photo' => ['string', 'nullable', 'max:255'],
        ];
    }
}
