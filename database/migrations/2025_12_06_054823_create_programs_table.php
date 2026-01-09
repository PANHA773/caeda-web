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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('short_description')->nullable();
            $table->string('duration');
            $table->enum('level', ['beginner', 'intermediate', 'advanced', 'expert'])->default('beginner');
            $table->unsignedInteger('students')->default(0);
            $table->decimal('rating', 3, 2)->default(0.00); // Fixed: 3,2 for ratings like 4.75
            $table->string('image')->nullable();
            $table->string('category');
            $table->enum('mode', ['online', 'offline', 'hybrid'])->default('online');
            $table->decimal('tuition', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->string('badge')->nullable();
            $table->string('badge_color')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->json('metadata')->nullable();
            $table->date('start_date')->nullable(); // Changed from timestamp to date
            $table->date('application_deadline')->nullable(); // Changed from timestamp to date
            $table->softDeletes();
            $table->timestamps();

            // Indexes for performance
            $table->index(['category', 'is_active']);
            $table->index(['mode', 'is_active']);
            $table->index(['is_featured', 'sort_order']);
            $table->index(['level', 'is_active']);
            $table->index(['start_date', 'is_active']);
            $table->index(['application_deadline', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};