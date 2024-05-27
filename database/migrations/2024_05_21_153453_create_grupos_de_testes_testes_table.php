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
        Schema::create('grupos_de_testes_testes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupos_de_testes_id')->references('id')->on('grupos_de_testes')->onDelete('cascade');
            $table->foreignId('testes_id')->references('id')->on('testes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos_de_testes_testes');
    }
};
