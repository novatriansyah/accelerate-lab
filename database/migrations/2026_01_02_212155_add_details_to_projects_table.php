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
        Schema::table('projects', function (Blueprint $table) {
            $table->json('gallery')->nullable(); // Array of image paths
            $table->json('testimonials')->nullable(); // Array of {client, quote} objects
        });

        // Pivot table for Project <-> Technology relationship
        Schema::create('project_technology', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['gallery', 'testimonials']);
        });
    }
};
