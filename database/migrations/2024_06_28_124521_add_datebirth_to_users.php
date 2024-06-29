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
        Schema::table('users', function (Blueprint $table) {
            $table->date('data_nascimento')->nullable();
            $table->string('sexo_biologico')->nullable();
            $table->string('estado_nascimento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('data_nascimento');
            $table->dropColumn('sexo_biologico');
            $table->dropColumn('estado_nascimento');
        });
    }
};
