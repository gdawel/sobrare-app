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
        Schema::create('opcoes_respostas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo_opcoes_respostas_id')->references('id')->on('grupo_opcoes_respostas')->cascadeOnDelete();
            $table->integer('numSeqResp');
            $table->string('textoResposta'); 
            $table->integer('valorResposta'); //Numérico, para cálculo em testes com fórmula
            $table->string('requer_comentarios'); // S ou N
            $table->string('requer_complemento'); // S ou N
            $table->string('tipoOpcaoResposta'); // P - principal / C - Complementar
            $table->string('inputType'); // checkbox, radio, select
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opcoes_respostas');
    }
};
