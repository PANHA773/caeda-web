<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('accreditations', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Name of accreditation or membership
            $table->enum('type', ['international', 'membership']); // Type
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accreditations');
    }
};
