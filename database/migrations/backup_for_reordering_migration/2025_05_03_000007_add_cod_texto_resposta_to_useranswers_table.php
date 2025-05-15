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
    Schema::table('useranswers', function (Blueprint $table) {
        $table->string('codTextoResposta')->nullable()->after('comentariosCliente');

        // Add the foreign key constraint
        $table->foreign('codTextoResposta')
              ->references('codTextoResposta') // Reference the column in texto_respostas
              ->on('texto_respostas');
    });
}

public function down(): void
{
    Schema::table('useranswers', function (Blueprint $table) {
        // Drop the foreign key first
        $table->dropForeign(['codTextoResposta']);
        
        // Then drop the column
        $table->dropColumn('codTextoResposta');
    });
}
};
