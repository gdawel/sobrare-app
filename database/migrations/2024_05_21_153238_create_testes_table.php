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
        Schema::create('testes', function (Blueprint $table) {
            $table->id();
            $table->string('codTeste');
            $table->string('nomeTeste');
            $table->string('slug')->unique();
            $table->text('memoInterno')->nullable();
            $table->longText('textoIntro')->nullable();
            $table->longText('textoFecha')->nullable();
            $table->longText('textoRodape')->nullable();
            $table->decimal('precoTeste', 12, 2);
            $table->boolean('isActive')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testes');
    }
};
