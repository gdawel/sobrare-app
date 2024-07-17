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
        Schema::create('useranswers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('orderitems_id')->references('id')->on('orderitems')->cascadeOnDelete();
            $table->foreignId('testes_id')->references('id')->on('testes')->cascadeOnDelete();
            $table->integer('sequencia');
            $table->foreignId('pergunta_id')->references('id')->on('perguntas')->cascadeOnDelete();
            $table->foreignId('opcoes_respostas_id')->references('id')->on('opcoes_respostas')->cascadeOnDelete();
            $table->json('opcRespCheckbox')->nullable();
            $table->integer('opcRespIntensidade')->nullable();
            $table->string('comentariosCliente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('useranswers');
    }
};
