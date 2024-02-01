<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            
            $table->string('cpf_cnpj')->unique();
            $table->string('nome');
            $table->string('cep');
            $table->string('endereco_cob');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('pais');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
