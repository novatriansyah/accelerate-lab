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
        Schema::table('services', function (Blueprint $table) {
            $table->string('category')->default('development'); // 'strategy' or 'development'
            $table->string('headline')->nullable(); // e.g. "Turning Chaos into Order"
            $table->json('benefits')->nullable(); // List of benefits/checklist items
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['category', 'headline', 'benefits']);
        });
    }
};
