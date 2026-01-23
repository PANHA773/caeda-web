<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hero_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('value');        // e.g., 50+, 98%
            $table->string('label');        // e.g., International Awards
            $table->string('icon');         // emoji or icon class
            $table->string('color');        // Tailwind gradient classes
            $table->integer('order')->default(1); // display order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_achievements');
    }
};
