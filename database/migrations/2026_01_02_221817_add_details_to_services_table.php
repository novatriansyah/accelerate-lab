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
            $table->json('features')->nullable(); // For "Why Choose Us" cards: {icon, title, description}
            $table->json('technologies')->nullable(); // List of technology names/icons
            $table->json('process')->nullable(); // For "How We Build" steps: {title, description}
            $table->string('cta_text')->nullable(); // Custom CTA text
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['features', 'technologies', 'process', 'cta_text']);
        });
    }
};
