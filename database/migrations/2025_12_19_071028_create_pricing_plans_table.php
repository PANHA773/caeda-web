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
       Schema::create('pricing_plans', function (Blueprint $table) {
    $table->id();
    $table->string('slug')->unique(); // basic, pro, enterprise
    $table->string('name');
    $table->text('description')->nullable();

    $table->decimal('monthly_price', 8, 2);
    $table->decimal('annual_price', 8, 2);

    $table->string('badge')->nullable(); // Most Popular, Starter
    $table->string('color')->nullable(); // blue, purple
    $table->string('gradient')->nullable();

    $table->string('members_count')->nullable();
    $table->boolean('is_popular')->default(false);
    $table->boolean('is_active')->default(true);

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_plans');
    }
};
