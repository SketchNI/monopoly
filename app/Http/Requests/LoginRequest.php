<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'exists:users,username'],
        ];
    }

    public function messages(): array
    {
        return [
            'username' => [
                'exists' => 'This username does not exist.',
            ]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
