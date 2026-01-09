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
        Schema::create('value_benefits', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Value / Benefit text
            $table->integer('sort_order')->default(0); // Display order
            $table->boolean('is_active')->default(true); // Active status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('value_benefits');
    }
};
