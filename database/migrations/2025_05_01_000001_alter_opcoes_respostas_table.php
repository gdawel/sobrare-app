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
        Schema::table('opcoes_respostas', function (Blueprint $table) {
            // Modifica o campo 'valorResposta' para decimal com 2 dígitos após a vírgula
            $table->decimal('valorResposta', 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('opcoes_respostas', function (Blueprint $table) {
            // Reverte o campo para integer (se necessário)
            $table->integer('valorResposta')->change();
        });

    }
};
