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

            $table->boolean('configStatus')->after('tituloSite');
            $table->string('configNotes')->after('configStatus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_configurations', function (Blueprint $table) {
            $table->dropColumn('configStatus');
            $table->dropColumn('configNotes');
        });
    }
};
