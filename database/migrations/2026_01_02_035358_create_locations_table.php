<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., Location, Hours, Contact
            $table->text('description')->nullable(); // Full content
            $table->string('icon')->nullable(); // FontAwesome icon class
            $table->string('color')->nullable(); // Optional color
            $table->integer('order')->nullable(); // Display order
            $table->boolean('status')->default(true); // Active/Inactive
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
