<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'game_id' => ['required', 'alpha_num:ascii', 'unique:games,game_id'],
            'color' => ['required', 'hex_color'],
            'token' => ['required', 'in:🐕,🚗,🚢,🎩,🐈,🦆,🐎,💩,🎱,✈️,🚂,👟'],
            'player_count' => ['required', 'integer', 'min:2', 'max:6'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
