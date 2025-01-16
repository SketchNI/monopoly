<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'game_id' => ['required', 'alpha_num:ascii', 'exists:games,game_id'],
            'name' => ['required', 'alpha:ascii'],
            'color' => ['required', 'hex_color'],
            'token' => ['required', 'in_array:🐕,🏎️,🚢,🎩,🐈,🦆,🐎,💩,🎱,✈️,🚂,👟'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
