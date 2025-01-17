<?php

namespace App\Models;

use App\Game\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Game extends Model
{
    protected $fillable = [
        'game_id',
        'user_id',
        'state',
        'winner',
        'in_progress',
    ];

    protected $casts = [
        'state' => 'json',
    ];

    protected $appends = [
        'game_state'
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function players(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, GameUser::class, 'game_id', 'id', 'id', 'user_id');
    }

    public function getGameStateAttribute()
    {
        return new State($this)->setupGame();
    }
}
