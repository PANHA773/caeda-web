<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('upcoming_workshops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->string('instructor');
            $table->string('image')->nullable();
            $table->string('instructor_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('upcoming_workshops');
    }
};
