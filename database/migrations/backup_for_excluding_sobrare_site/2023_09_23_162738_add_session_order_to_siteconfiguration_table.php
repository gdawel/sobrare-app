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

            $table->string('sessionPosition1')->after('cta1TextoExtra');
            $table->string('sessionPosition2')->after('sessionPosition1');
            $table->string('sessionPosition3')->after('sessionPosition2');
            $table->string('sessionPosition4')->after('sessionPosition3');
            $table->string('sessionPosition5')->after('sessionPosition4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_configurations', function (Blueprint $table) {

            $table->dropColumn('sessionPosition1');
            $table->dropColumn('sessionPosition2');
            $table->dropColumn('sessionPosition3');
            $table->dropColumn('sessionPosition4');
            $table->dropColumn('sessionPosition5');
        });
    }
};
