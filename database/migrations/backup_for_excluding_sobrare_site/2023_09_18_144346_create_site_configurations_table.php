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
        Schema::create('site_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('tituloSite');
            $table->string('logoClaro')->nullable();
            $table->string('logoEscuro')->nullable();

            $table->string('cta1Titulo');
            $table->longText('cta1TextoBase');
            $table->string('cta1TextoBotao');
            $table->string('cta1TextoExtra');

            $table->string('cta2Titulo1');
            $table->string('cta2Titulo2');
            $table->longText('cta2TextoBase');
            $table->string('cta2TextoBotao');
            $table->string('cta2LinkBotao');

            $table->string('aboutChamada');
            $table->longText('aboutTitulo');
            $table->longText('aboutResumo');
            $table->string('aboutTextoBotao');
            $table->string('aboutLinkBotao');

            $table->string('servicosTitulo');
            $table->longText('servicosResumo');

            $table->string('depoimentosTitulo');
            $table->longText('depoimentosResumo');

            $table->string('blogHomeTitulo');
            $table->longText('blogHomeResumo');

            $table->string('contatoTitulo');
            $table->longText('contatoResumo');

            $table->string('rodapeEmailTitulo')->nullable();
            $table->string('rodapeEmailTexto')->nullable();
            $table->string('rodapeLocalTitulo')->nullable();
            $table->string('rodapeLocalEndereco1')->nullable();
            $table->string('rodapeLocalEndereco2')->nullable();
            $table->string('rodapeLocalEndereco3')->nullable();
            $table->string('rodapeTelefoneTitulo')->nullable();
            $table->string('rodapeTelefoneTexto')->nullable();
            $table->string('rodapeOutrosTitulo')->nullable();
            $table->string('rodapeOutrosTexto')->nullable();
            $table->string('rodapeMediasTitulo')->nullable();
            $table->longText('rodapeTextoBase')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_configurations');
    }
};
