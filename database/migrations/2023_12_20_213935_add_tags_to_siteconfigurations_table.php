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
        Schema::table('site_configurations', function (Blueprint $table) {
            $table->string('google_tag', 1048)->nullable();
            $table->string('meta_pixel', 1048)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_configurations', function (Blueprint $table) {
            $table->dropColumn('google_tag');
            $table->dropColumn('meta_pixel');
        });
    }
};
