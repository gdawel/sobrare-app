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
        Schema::create('historicomedicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orders_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->string('genero')->nullable();
            $table->string('etnia')->nullable();
            $table->string('maoMaisAgil')->nullable();
            $table->string('cidadeQueReside')->nullable();
            $table->string('outrosIdiomas')->nullable();
            $table->string('grauEscolar')->nullable();
            $table->string('deficitAtencao')->nullable();
            $table->string('anorexiaNervosa')->nullable();
            $table->string('transtornoAnsiedade')->nullable();
            $table->string('autismoNivel1')->nullable();
            $table->string('transtornoBipolar')->nullable();
            $table->string('depressao')->nullable();
            $table->string('transtornoHistrionico')->nullable();
            $table->string('transtornoAnancastico')->nullable();
            $table->string('transtornoIntelectual')->nullable();
            $table->string('dificuldadeExpressar')->nullable();
            $table->string('toc')->nullable();
            $table->string('transtornoDePersonalidade')->nullable();
            $table->string('fobias')->nullable();
            $table->string('esquizofrenia')->nullable();
            $table->string('outroEspecificar')->nullable();
            $table->string('hiperlexia')->nullable();
            $table->string('hipercalculia')->nullable();
            $table->string('ouvidoAbsoluto')->nullable();
            $table->string('talentoPintar')->nullable();
            $table->string('faixaSuperiorQI')->nullable();
            $table->integer('qtdIrmasBio')->default(0);
            $table->integer('qtdIrmaosBio')->default(0);
            $table->integer('qtdFilhosBio')->default(0);
            $table->string('familiaNuclear')->nullable();
            $table->integer('diagnosticoParentes')->default(0);
            $table->integer('filhosSobCuidados')->default(0);
            $table->integer('descendentesPrecisamAvaliacao')->default(0);
            $table->integer('filhosComDiagnostico')->default(0);
            $table->string('ocupacaoPrincipal')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historicomedicos');
    }
};
