<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GameUser extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'game_id',
        'user_id',
    ];

    public function game(): HasOne
    {
        return $this->hasOne(Game::class, 'id', 'game_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
