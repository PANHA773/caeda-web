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
        Schema::table('programs', function (Blueprint $table) {
            // 如果 category 字段不存在，添加它
            if (!Schema::hasColumn('programs', 'category')) {
                $table->string('category')->nullable()->after('title');
            }
            
            // 如果 discount 字段不存在，添加它
            if (!Schema::hasColumn('programs', 'discount')) {
                $table->decimal('discount', 10, 2)->nullable()->after('tuition');
            }
            
            // 如果 is_active 字段不存在，添加它
            if (!Schema::hasColumn('programs', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('is_featured');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['category', 'discount', 'is_active']);
        });
    }
};