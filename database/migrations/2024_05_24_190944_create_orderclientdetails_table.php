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
        Schema::create('orderclientdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('phone')->nullable();
            $table->string('cobranca_cep');
            $table->string('cobranca_rua')->nullable();
            $table->string('cobranca_numero')->nullable();
            $table->string('cobranca_complemento')->nullable();
            $table->string('cobranca_bairro')->nullable();
            $table->string('cobranca_cidade')->nullable();
            $table->string('cobranca_estado')->nullable();
            $table->string('cobranca_pais')->nullable();
            $table->string('cobranca_tax_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderclientdetails');
    }
};
