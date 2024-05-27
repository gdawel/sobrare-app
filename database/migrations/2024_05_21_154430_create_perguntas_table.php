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
        Schema::create('perguntas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('testes_id')->references('id')->on('testes')->cascadeOnDelete();
            $table->foreignId('grupo_opcoes_respostas_id')->references('id')->on('grupo_opcoes_respostas')->cascadeOnDelete();
            $table->integer('sequencia');
            $table->string('enunciado');
            $table->string('sexo');
            $table->string('codGrupoOpcRespostas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perguntas');
    }
};
