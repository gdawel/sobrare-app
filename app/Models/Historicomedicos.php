<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historicomedicos extends Model
{
    use HasFactory;

    protected $fillable = [
             'orders_id',
             'genero',
             'etnia',
             'maoMaisAgil',
             'cidadeQueReside',
             'outrosIdiomas',
             'deficitAtencao',
             'anorexiaNervosa',
             'transtornoAnsiedade',
             'autismoNivel1',
             'transtornoBipolar',
             'depressao',
             'transtornoHistrionico',
             'transtornoAnancastico',
             'transtornoIntelectual',
             'dificuldadeExpressar',
             'toc',
             'transtornoDePersonalidade',
             'fobias',
             'esquizofrenia',
             'outroEspecificar',
             'hiperlexia',
             'hipercalculia',
             'ouvidoAbsoluto',
             'talentoPintar',
             'faixaSuperiorQI',
             'qtdIrmasBio',
             'qtdIrmaosBio',
             'qtdFilhosBio',
             'familiaNuclear',
             'diagnosticoParentes',
             'filhosSobCuidados',
             'descendentesPrecisamAvaliacao',
             'filhosComDiagnostico',
             'ocupacaoPrincipal',

    ];
}
