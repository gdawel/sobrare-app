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
        Schema::create('grupos_de_testes', function (Blueprint $table) {
            $table->id();
            $table->string('codGrupo')->unique();
            $table->string('nomeGrupo');
            $table->string('slug')->unique();
            $table->longText('descricaoCurta');
            $table->longText('descricaoLonga');
            $table->string('imagemGrupo')->nullable();
            $table->decimal('precoGrupo', 12, 2);
            $table->boolean('isActive')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos_de_testes');
    }
};
