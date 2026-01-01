<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('workshop_benefits', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable(); // emoji or icon class
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('status')->default(1); // active/inactive
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workshop_benefits');
    }
};
