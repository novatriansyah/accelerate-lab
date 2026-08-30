<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('demos', function (Blueprint $table) {
            $table->string('client_logo')->nullable()->after('client_name');
            $table->string('thumbnail')->nullable()->after('client_logo');
            $table->json('assets')->nullable()->after('html_content');
        });
    }

    public function down(): void
    {
        Schema::table('demos', function (Blueprint $table) {
            $table->dropColumn(['client_logo', 'thumbnail', 'assets']);
        });
    }
};
