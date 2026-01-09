<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('member_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable(); // could store emoji or image path
            $table->integer('members')->default(0);
            $table->string('industry')->nullable();
            $table->string('color')->nullable(); // tailwind gradient
            $table->string('animation')->nullable(); // tailwind animation class
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('member_companies');
    }
};
