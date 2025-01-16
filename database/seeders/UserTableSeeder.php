<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'Denver',
            'color' => '#3399ff',
            'token' => '🚗',
        ]);

        User::create([
            'username' => 'Netta',
            'color' => '#794CA6',
            'token' => '🐕',
        ]);
    }
}
