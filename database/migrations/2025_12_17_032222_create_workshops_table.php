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
            
            // Basic Information (matching your view)
            $table->string('title');
            $table->string('category'); // technology, buddhist, education, research, creative, wellness
            $table->string('instructor');
            $table->date('date');
            $table->string('duration');
            $table->string('level'); // beginner, intermediate, advanced
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->text('description');
            $table->integer('attendees')->default(0);
            $table->decimal('rating', 2, 1)->default(0); // 4.5 format
            
            // View-specific fields (for the JavaScript functions)
            $table->boolean('registration_open')->default(true);
            $table->integer('seats_available')->nullable();
            $table->string('status')->default('active'); // active, completed, cancelled
            
            // SEO and additional fields
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->text('objectives')->nullable();
            $table->text('prerequisites')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->string('currency', 3)->default('USD');
            $table->boolean('is_featured')->default(false);
            $table->string('location')->nullable();
            $table->string('mode')->default('online'); // online, in-person, hybrid
            $table->string('language', 10)->default('en');
            
            // Timestamps
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes for better performance
            $table->index('category');
            $table->index('date');
            $table->index('status');
            $table->index('is_featured');
            $table->index('registration_open');
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