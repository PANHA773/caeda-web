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
         Schema::create('featured_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('badge')->nullable(); // BESTSELLER, TRENDING
            $table->string('image');
            $table->decimal('price', 8, 2);
            $table->decimal('old_price', 8, 2)->nullable();
            $table->text('description')->nullable();
            $table->decimal('rating', 2, 1)->default(5.0);
            $table->integer('reviews')->default(0);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_menus');
    }
};
