<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->date('date');

            // Store time in 24-hour format (HH:MM:SS)
            $table->time('time')->nullable();

            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);

            // Helpful indexes
            $table->index('date');
            $table->index('is_active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
