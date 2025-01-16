<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    public function run(): void
    {
        /* Brown */
        Property::create([
            'name' => 'Old Kent Road',
            'color' => '#631919',
            'price' => 60,
            'housing_cost' => 50,
            'charges' => [2, 10, 30, 90, 160, 160],
        ]);
        Property::create([
            'name' => 'Whitechapel Road',
            'color' => '#631919',
            'price' => 60,
            'housing_cost' => 50,
            'charges' => [4, 20, 60, 180, 320, 450],
        ]);

        /* Blue */
        Property::create([
            'name' => 'The Angel Islington',
            'color' => '#3299FF',
            'price' => 100,
            'housing_cost' => 50,
            'charges' => [6, 30, 90, 270, 400, 550],
        ]);
        Property::create([
            'name' => 'Euston Road',
            'color' => '#3299FF',
            'price' => 100,
            'housing_cost' => 50,
            'charges' => [6, 30, 90, 270, 400, 550],
        ]);
        Property::create([
            'name' => 'Pentonville Road',
            'color' => '#3299FF',
            'price' => 120,
            'housing_cost' => 50,
            'charges' => [8, 40, 100, 300, 450, 600],
        ]);

        /* Pink */
        Property::create([
            'name' => 'Pall Mall',
            'color' => '#FF5270',
            'price' => 140,
            'housing_cost' => 100,
            'charges' => [10, 50, 150, 450, 625, 750],
        ]);
        Property::create([
            'name' => 'Whitehall',
            'color' => '#FF5270',
            'price' => 140,
            'housing_cost' => 100,
            'charges' => [10, 50, 150, 450, 625, 750],
        ]);
        Property::create([
            'name' => 'Northumberland Avenue',
            'color' => '#FF5270',
            'price' => 160,
            'housing_cost' => 100,
            'charges' => [12, 60, 180, 500, 700, 900],
        ]);

        /* Orange */
        Property::create([
            'name' => 'Bow Street',
            'color' => '#E59400',
            'price' => 180,
            'housing_cost' => 100,
            'charges' => [14, 70, 200, 550, 750, 950],
        ]);
        Property::create([
            'name' => 'Vine Street',
            'color' => '#E59400',
            'price' => 180,
            'housing_cost' => 100,
            'charges' => [14, 70, 200, 550, 750, 950],
        ]);
        Property::create([
            'name' => 'Marlborough Street',
            'color' => '#E59400',
            'price' => 200,
            'housing_cost' => 100,
            'charges' => [16, 80, 220, 600, 800, 1000],
        ]);

        /* Red */
        Property::create([
            'name' => 'Strand',
            'color' => '#FF3232',
            'price' => 220,
            'housing_cost' => 150,
            'charges' => [18, 90, 250, 700, 875, 1050],
        ]);
        Property::create([
            'name' => 'Fleet Street',
            'color' => '#FF3232',
            'price' => 220,
            'housing_cost' => 150,
            'charges' => [18, 90, 250, 700, 875, 1050],
        ]);
        Property::create([
            'name' => 'Trafalgar Square',
            'color' => '#FF3232',
            'price' => 240,
            'housing_cost' => 150,
            'charges' => [20, 100, 300, 750, 925, 1100],
        ]);

        /* Yellow */
        Property::create([
            'name' => 'Leicester Square',
            'color' => '#FFFF4C',
            'price' => 260,
            'housing_cost' => 150,
            'charges' => [22, 110, 330, 800, 975, 1150],
        ]);
        Property::create([
            'name' => 'Coventry Street',
            'color' => '#FFFF4C',
            'price' => 260,
            'housing_cost' => 150,
            'charges' => [22, 110, 330, 800, 975, 1150],
        ]);
        Property::create([
            'name' => 'Piccadilly',
            'color' => '#FFFF4C',
            'price' => 280,
            'housing_cost' => 150,
            'charges' => [24, 120, 360, 850, 1025, 1200],
        ]);

        /* Green */
        Property::create([
            'name' => 'Regent Street',
            'color' => '#198C19',
            'price' => 300,
            'housing_cost' => 200,
            'charges' => [26, 130, 390, 900, 1100, 1275],
        ]);
        Property::create([
            'name' => 'Oxford Street',
            'color' => '#198C19',
            'price' => 300,
            'housing_cost' => 200,
            'charges' => [26, 130, 390, 900, 1100, 1275],
        ]);
        Property::create([
            'name' => 'Bond Street',
            'color' => '#198C19',
            'price' => 320,
            'housing_cost' => 200,
            'charges' => [28, 150, 450, 1000, 1200, 1400],
        ]);

        /* Purple */
        Property::create([
            'name' => 'Park Lane',
            'color' => '#53198C',
            'price' => 350,
            'housing_cost' => 200,
            'charges' => [35, 175, 500, 1100, 1300, 1500],
        ]);
        Property::create([
            'name' => 'Mayfair',
            'color' => '#53198C',
            'price' => 400,
            'housing_cost' => 200,
            'charges' => [50, 200, 600, 1400, 1700, 2000],
        ]);

        /* Train Stations */
        Property::create([
            'name' => "King's Cross Station",
            'type' => 'train',
            'color' => '#ffffff',
            'price' => 200,
            'housing_cost' => null,
            'charges' => [25, 50, 100, 200],
        ]);
        Property::create([
            'name' => 'Marylebone Station',
            'type' => 'train',
            'color' => '#ffffff',
            'price' => 200,
            'housing_cost' => null,
            'charges' => [25, 50, 100, 200],
        ]);
        Property::create([
            'name' => 'Fenchurch Street Station',
            'type' => 'train',
            'color' => '#ffffff',
            'price' => 200,
            'housing_cost' => null,
            'charges' => [25, 50, 100, 200],
        ]);
        Property::create([
            'name' => 'Liverpool Street Station',
            'type' => 'train',
            'color' => '#ffffff',
            'price' => 200,
            'housing_cost' => null,
            'charges' => [25, 50, 100, 200],
        ]);

        /* Utilities */
        Property::create([
            'name' => 'Gas Company',
            'type' => 'utility',
            'color' => '#ffffff',
            'price' => 150,
            'housing_cost' => null,
            'charges' => [4, 10],
        ]);
        Property::create([
            'name' => 'Communications Company',
            'type' => 'utility',
            'color' => '#ffffff',
            'price' => 150,
            'housing_cost' => null,
            'charges' => [4, 10],
        ]);
    }
}
