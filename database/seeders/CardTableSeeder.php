<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;

class CardTableSeeder extends Seeder
{
    public function run(): void
    {
        /* Chance Cards */
        Card::create([
            'type' => 'chance',
            'action' => 'move',
            'action_to' => 'space',
            'text' => 'Advance to Go!',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'move',
            'action_to' => 'space',
            'text' => 'Advance to Trafalgar Square. If you pass Go, collect £200!',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'move',
            'action_to' => 'space',
            'text' => 'Advance to Mayfair',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'move',
            'action_to' => 'space',
            'text' => 'Advance to Pall Mall. If you pass Go, collect £200!',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'move',
            'action_to' => 'space',
            'text' => 'Advance to the nearest Station.',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'move',
            'action_to' => 'space',
            'text' => 'Advance to the nearest Utility.',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'get',
            'action_to' => 'self',
            'amount' => 50,
            'text' => 'Bank pays you a dividend of £50.',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'free',
            'action_to' => 'hold',
            'text' => 'Get out of Jail Free.',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'move',
            'action_to' => 'space',
            'amount' => -3,
            'text' => 'Go back 3 spaces.',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'jail',
            'action_to' => 'self',
            'text' => 'Go to Jail. Go directly to Jail. Do not pass Go. Do not collect £200.',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'give',
            'action_to' => 'bank',
            'amount' => 15,
            'text' => 'Speeding fine of £15.',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'move',
            'action_to' => 'space',
            'text' => "Take a trip to King's Cross Station. If you pass Go, collect £200.",
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'give',
            'action_to' => 'players',
            'amount' => 50,
            'text' => 'You have been elected Chairman of the Board. Pay each player £50',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'get',
            'action_to' => 'self',
            'amount' => 150,
            'text' => 'Your building loan matures. Collect £150.',
        ]);

        Card::create([
            'type' => 'chance',
            'action' => 'get',
            'action_to' => 'self',
            'amount' => 100,
            'text' => 'You have won a crossword competition. Collect £100',
        ]);

        /* Community Chest Cards */
        Card::create([
            'type' => 'chest',
            'action' => 'move',
            'action_to' => 'space',
            'text' => 'Advance to Go!',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'get',
            'action_to' => 'self',
            'amount' => 200,
            'text' => 'Bank error in your favour. Collect £200.',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'give',
            'action_to' => 'bank',
            'amount' => 50,
            'text' => "Doctor's Fee. Pay £50.",
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'get',
            'action_to' => 'self',
            'amount' => 50,
            'text' => 'From sale of stock, you get £50.',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'free',
            'action_to' => 'hold',
            'text' => 'Get out of Jail Free.',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'jail',
            'action_to' => 'self',
            'text' => 'Go to Jail. Go directly to Jail. Do not pass Go. Do not collect £200.',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'get',
            'action_to' => 'self',
            'amount' => 100,
            'text' => 'Holiday fund matures. Collect £100.',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'get',
            'action_to' => 'self',
            'amount' => 20,
            'text' => 'Income Tax refund. Collect £20',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'get',
            'action_to' => 'players',
            'amount' => 10,
            'text' => 'It is your birthday! Collect £10 from every player!',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'get',
            'action_to' => 'self',
            'amount' => 10,
            'text' => 'Life insurance matures. Collect £100.',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'give',
            'action_to' => 'bank',
            'amount' => 100,
            'text' => 'Pay hospital fees of £100',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'give',
            'action_to' => 'bank',
            'amount' => 50,
            'text' => 'Pay school fees of £50',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'get',
            'action_to' => 'self',
            'amount' => 25,
            'text' => 'Collect £25 consultancy fee.',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'get',
            'action_to' => 'self',
            'amount' => 10,
            'text' => 'You have won second prize in a beauty contest. Collect £10',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'get',
            'action_to' => 'self',
            'amount' => 100,
            'text' => 'You inherit £100.',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'move',
            'action_to' => 'space',
            'amount' => 100,
            'text' => 'Go back to Old Kent Road',
        ]);

        Card::create([
            'type' => 'chest',
            'action' => 'chance',
            'action_to' => 'self',
            'amount' => 10,
            'text' => 'Pay a £10 fine or take a Chance.',
        ]);
    }
}
