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
        Schema::create('orderitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orders_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->foreignId('testes_id')->references('id')->on('testes')->cascadeOnDelete();
            $table->decimal('unitPrice', 10, 2);
            $table->integer('quantity')->default(1); // Neste caso, não usaremos quantidade. Cada cliente adquire apenas um teste.
            $table->decimal('itemTotal', 10, 2); // Idem. Para uso futuro.
            $table->string('testeStatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitems');
    }
};
