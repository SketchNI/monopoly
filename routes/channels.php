<?php

use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('lobby', function ($user) {
    return $user;
});

Broadcast::channel('game.{game_id}', function (User $user, Game $game) {
    return $user;
});
