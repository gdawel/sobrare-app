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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->dateTime('orderDate');
            $table->decimal('grand_total, 12, 2');
            $table->string('paymentMethod')->nullable();
            $table->string('paymentStatus')->nullable();
            $table->enum('orderStatus', ['novo', 'pendente', 'concluido', 'cancelado' ])->default('novo');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
