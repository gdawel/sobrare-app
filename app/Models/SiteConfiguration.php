<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [

        'tituloSite',
        'configStatus',
        'configNotes',

        'logoClaro',
        'logoEscuro',
        'cta1Titulo',
        'cta1TextoBase',
        'cta1TextoBotao',
        'cta1TextoExtra',
        'sessionPosition1',
        'sessionPosition2',
        'sessionPosition3',
        'sessionPosition4',
        'sessionPosition5',
        'cta2Titulo1',
        'cta2Titulo2',
        'cta2TextoBase',
        'cta2TextoBotao',
        'cta2LinkBotao',
        'aboutChamada',
        'aboutTitulo',
        'aboutResumo',
        'aboutTextoBotao',
        'aboutLinkBotao',
        'servicosTitulo',
        'servicosResumo',
        'depoimentosTitulo',
        'depoimentosResumo',
        'blogHomeTitulo',
        'blogHomeResumo',
        'contatoTitulo',
        'contatoResumo',
        'rodapeEmailTitulo',
        'rodapeEmailTexto',
        'rodapeLocalTitulo',
        'rodapeLocalEndereco1',
        'rodapeLocalEndereco2',
        'rodapeLocalEndereco3',
        'rodapeTelefoneTitulo',
        'rodapeTelefoneTexto',
        'rodapeOutrosTitulo',
        'rodapeOutrosTexto',
        'rodapeMediasTitulo',
        'rodapeTextoBase'
    ];
}
