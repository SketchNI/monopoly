<?php

namespace App\Game;

use App\Models\Card;
use App\Models\Game;
use App\Models\Property;

class State
{
    public array $properties = [];

    public array $community_chest = [];

    public array $chance = [];

    public int $current_player;

    public array $players = [];

    public int $dice_1;

    public int $dice_2;

    public function __construct(public Game $game)
    {
        /*$this->community_chest = Card::whereType('chest')->get()->toArray();
        $this->chance = Card::whereType('chance')->get()->toArray();*/
        $this->properties = Property::limit(5)->get()->toArray();
        $this->players = $game->players()->get(['id', 'username', 'color', 'token'])->toArray();
    }

    public function setupGame()
    {
        return [
            'players' => $this->players,
            'community_chest' => $this->community_chest,
            'chance' => $this->chance,
            'properties' => $this->properties,
        ];
    }

    private function switchPlayer()
    {
        $this->current_player = '';
    }
}
