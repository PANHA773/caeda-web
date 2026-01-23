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
          Schema::create('project_overviews', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // e.g., "Project-Based Learning"
            $table->text('description');      // Long description
            $table->integer('order')->default(0); 
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_overviews');
    }
};
