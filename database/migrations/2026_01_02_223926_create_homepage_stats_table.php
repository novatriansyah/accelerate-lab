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
        Schema::create('homepage_stats', function (Blueprint $table) {
            $table->id();
            $table->string('value'); // e.g., '99.9', '50'
            $table->string('unit')->nullable(); // e.g., '%', '+', 'yr'
            $table->string('label'); // e.g., 'Uptime Guarantee'
            $table->string('section')->default('hero'); // 'hero' or 'capabilities'
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_stats');
    }
};
