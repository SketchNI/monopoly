<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_users', function (Blueprint $table) {
            $table->integer('game_id');
            $table->integer('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_users');
    }
};
