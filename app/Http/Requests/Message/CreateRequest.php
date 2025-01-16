<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => ['required', 'string', 'max:2048'],
            'game_id' => ['nullable', 'string', 'exists:games,game_id'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->check();
    }
}
