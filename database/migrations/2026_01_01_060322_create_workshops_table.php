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
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('instructor');
            $table->date('date');
            $table->string('duration');
            $table->string('level');
            $table->string('image');
            $table->string('video')->nullable();
            $table->text('description');
            $table->integer('attendees')->default(0);
            $table->decimal('rating', 2, 1)->default(0);
            $table->string('instructor_image')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
