<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('performance_metrics', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('value'); // percentage
            $table->string('color')->default('#3b82f6'); // tailwind color hex
            $table->integer('order')->default(1);
            $table->timestamps();
        });

        Schema::create('growth_stats', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('value'); // e.g., 45%
            $table->string('trend')->default('up'); // up/down
            $table->string('icon')->nullable(); // font-awesome icon name
            $table->integer('order')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('performance_metrics');
        Schema::dropIfExists('growth_stats');
    }
};
