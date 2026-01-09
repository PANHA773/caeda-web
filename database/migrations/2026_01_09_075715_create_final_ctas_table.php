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
         Schema::create('final_ctas', function (Blueprint $table) {
            $table->id();

            // Stats
            $table->string('stat_1_number');
            $table->string('stat_1_label');

            $table->string('stat_2_number');
            $table->string('stat_2_label');

            $table->string('stat_3_number');
            $table->string('stat_3_label');

            // Content
            $table->string('title');
            $table->string('highlight_text')->nullable();
            $table->text('description')->nullable();

            // Buttons
            $table->string('primary_button_text');
            $table->string('secondary_button_text');

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_ctas');
    }
};
