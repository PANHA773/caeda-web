<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('committee_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('image')->nullable();
            $table->string('gradient')->default('from-blue-500 to-indigo-600');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('committee_members');
    }
};
