<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['chance', 'chest']);
            $table->enum('action', ['move', 'get', 'give', 'free', 'jail', 'chance']);
            $table->enum('action_to', ['hold', 'space', 'bank', 'self', 'players']);
            $table->integer('amount')->nullable();
            $table->text('text');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
