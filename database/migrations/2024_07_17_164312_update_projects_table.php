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
            $table->string('title', 255)->after('id');
            $table->string('type', 100)->after('title');
            $table->string('programming_language', 100)->after('type');
            $table->string('slug', 255)->after('programming_language');
            $table->string('status', 20)->after('slug');
            $table->string('preview_path')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['title', 'type', 'programming_language', 'slug', 'status', 'preview_path']);
        });
    }
};
