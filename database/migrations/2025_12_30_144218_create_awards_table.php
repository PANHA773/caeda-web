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
         Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('organization');
            $table->string('year');
            $table->string('category'); // international, education, innovation, research
            $table->string('icon')->nullable(); // trophy, flask, etc
            $table->text('description')->nullable();
            $table->string('color')->nullable(); // from-yellow-500 to-orange-500
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awards');
    }
};
