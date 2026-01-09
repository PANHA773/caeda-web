<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('cause');
            $table->string('payment_method')->default('card');
            $table->boolean('recurring')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
