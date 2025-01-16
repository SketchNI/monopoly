<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['property', 'train', 'utility'])->default('property');
            $table->string('color');
            $table->integer('price');
            $table->integer('housing_cost')->nullable();
            $table->text('charges');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
