<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('about_contents', function (Blueprint $table) {
            $table->string('rector_name')->nullable();
            $table->text('rector_message')->nullable();
            $table->string('rector_image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('about_contents', function (Blueprint $table) {
            $table->dropColumn(['rector_name', 'rector_message', 'rector_image']);
        });
    }
};
