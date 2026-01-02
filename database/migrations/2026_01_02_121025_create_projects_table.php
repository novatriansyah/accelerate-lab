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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client')->nullable();
            $table->text('description');
            $table->text('challenge')->nullable();
            $table->text('solution')->nullable();
            $table->json('technology_tags')->nullable();
            $table->string('image_path')->nullable();
            $table->json('stats')->nullable(); // e.g., [{"label": "Uptime", "value": "99.9%"}]
            $table->string('color')->nullable(); // For UI accents (e.g. 'blue', 'purple')
            $table->string('icon')->nullable(); // Material icon name
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
