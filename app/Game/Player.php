<?php

namespace App\Game;

use App\Models\User;

class Player
{
    public int $money = 0;

    public array $owned_properties = [];

    public int $get_out_jail_free_cards = 0;

    public int $id = 0;

    public string $username = '';

    public string $color = '';

    public string $token = '';

    public function __construct(User $player)
    {
        $this->id = $player->id;
        $this->username = $player->username;
        $this->color = $player->color;
        $this->token = $player->token;
        $this->money = 3675;
    }

    public function get(): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'color' => $this->color,
            'token' => $this->token,
            'money' => $this->money,
            'owned_properties' => $this->owned_properties,
            'get_out_jail_free_cards' => $this->get_out_jail_free_cards,
        ];
    }
}
