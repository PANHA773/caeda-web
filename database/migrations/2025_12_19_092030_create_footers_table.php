<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->default('CAEDA'); // footer logo
            $table->text('description')->nullable(); // short description
            $table->string('tagline')->nullable(); // slogan
            $table->json('social_links')->nullable(); // Facebook, Twitter, etc
            $table->json('quick_links')->nullable(); // name + route
            $table->json('contact_info')->nullable(); // address, phone, email
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
