<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_steps', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "Browse Menu"
            $table->text('description')->nullable(); // e.g., "View our complete menu online"
            $table->string('icon')->nullable(); // e.g., "fas fa-mobile-alt"
            $table->integer('order')->default(0); // ordering of steps
            $table->boolean('status')->default(true); // active/inactive
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_steps');
    }
};
