<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('welcome_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->json('description')->nullable(); // Can store multiple paragraphs as JSON or text
            $table->string('signature_name')->nullable();
            $table->string('signature_title')->nullable();
            $table->string('image')->nullable();
            $table->json('badges')->nullable(); // e.g., [{text: "Excellence", color: "yellow"}]
            $table->json('stats')->nullable();  // e.g., [{number: "50+", label: "Years of Excellence"}]
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('welcome_sections');
    }
};
