<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_methods', function (Blueprint $table) {
            $table->id();
            $table->string('title');       // e.g., "Phone Number"
            $table->string('icon');        // e.g., "fas fa-phone"
            $table->text('content');       // e.g., phone numbers or address
            $table->string('color');       // Tailwind gradient class
            $table->string('action')->nullable();       // e.g., "Call Now"
            $table->string('action_icon')->nullable();  // e.g., "fas fa-phone-alt"
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_methods');
    }
};
