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
            $table->date('data_nascimento')->nullable()->after('usertype');
            $table->string('sexo_biologico')->nullable()->after('data_nascimento');
            $table->string('estado_nascimento')->nullable()->after('sexo_biologico');
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
