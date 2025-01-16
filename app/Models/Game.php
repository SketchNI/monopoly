<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Game extends Model
{

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, GameUser::class);
    }
}
