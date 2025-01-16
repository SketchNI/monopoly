<?php

use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('lobby', function ($user) {
    return $user;
});

Broadcast::channel('game.{game_id}', function (User $user, $game) {
    $players = Game::whereGameId($game)->first()->players()->get(['username'])->flatten()->toArray();

    $users = [];
    foreach ($players as $player) {
        $users[] = $player['username'];
    }

    if (in_array($user->username, $users)) {
        return $user;
    }

    return false;
});
