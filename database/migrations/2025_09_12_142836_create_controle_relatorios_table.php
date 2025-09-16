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
        Schema::create('controle_relatorios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete(); // Quem fez o teste
            $table->foreignId('testes_id')->references('id')->on('testes')->cascadeOnDelete(); // Qual o teste
            $table->foreignId('orders_id')->references('id')->on('orders')->cascadeOnDelete(); // Qual o pedido relativo ao teste
            $table->foreignId('orderItem_id')->references('id')->on('controle_relatorios')->cascadeOnDelete(); // O item do pedido que liberou este teste
            
            $table->string('status')->default('pendente'); // Ex: pendente, gerando, sucesso, falha
            $table->string('file_path')->nullable(); // Caminho para o PDF em storage
            

            // Campos para a Fase 2 (IA)
            $table->text('ai_sumario')->nullable();
            $table->text('ai_situacao_analise')->default('nao_requisitado'); // nao_requisitado, pendente, sucesso, falha
            $table->text('ai_analise')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controle_relatorios');
    }
};
