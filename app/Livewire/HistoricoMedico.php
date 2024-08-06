<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use App\Models\Historicomedicos;

class HistoricoMedico extends Component
{
   /* #[Validate('required|date', Carbon::now()-6575, message: 'Este teste é para maiores de 18 anos')] */ 
    #[Validate('required', message: 'Por favor, informe a Data de Nascimento')] 
    public	$dataNasc;
    
    #[Validate('required', message: 'Por favor, selecione o sexo biológico atribuído a você')] 
    public  $sexoBiologico;
    #[Validate('required', message: 'Por favor, selecione o Estado em que você nasceu')] 
    public  $estadoNasc;	     
    public	$genero;
    public  $etnia;
    public  $maoMaisAgil;
    public  $cidadeQueReside;
    public  $outrosIdiomas;
    public	$grauEscolar;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $deficitAtencao;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $anorexiaNervosa;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $transtornoAnsiedade;
    
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $autismoNivel1;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $transtornoBipolar;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $depressao;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $transtornoHistrionico;
    
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $transtornoAnancastico;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $transtornoIntelectual;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $dificuldadeExpressar;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $toc;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $transtornoDePersonalidade;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $fobias;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $esquizofrenia;
    #[Validate('max:250', message: 'Por favor, limite seu comentário a 250 caracteres.')] 
    public  $outroEspecificar;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $hiperlexia;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $hipercalculia;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $ouvidoAbsoluto;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $talentoPintar;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não; ou Branco, caso não queira responder')] 
    public  $faixaSuperiorQI;
    
    public  $qtdIrmasBio;
    public  $qtdIrmaosBio;
    public  $qtdFilhosBio;
    public  $familiaNuclear;
    public  $diagnosticoParentes;
    public  $filhosSobCuidados;
    public  $descendentesPrecisamAvaliacao;
    public  $filhosComDiagnostico;
    #[Validate('required', message: 'Por favor, informe sua ocupação')] 
    #[Validate('max:60', message: 'Máximo de caracteres permitido nesta informação é 60 caracteres')] 
    public  $ocupacaoPrincipal; 

    #[Url]
    public  $order_id;
    
    public function salvarHistorico(){
        //dd($this->diagnosticoParentes);
        // Eventual necessidade de consistência de data. Ex.: maiores de 18 anos. Não foi implementado.
        $date2 = Carbon::parse($this->dataNasc);
        $date1 = Carbon::now();
        $days = $date2->diffInDays($date1);

        $resultado = "Data2(Nasc)=".$date2." | Data1(Hoje):".$date1." | #Dias: ".$days;
        //dd($resultado);
        $this->validate();
        
        

        HistoricoMedicos::create([
             'orders_id' => $this->order_id,
             'genero' => $this->genero,
             'etnia' => $this->etnia,
             'maoMaisAgil' => $this->maoMaisAgil,
             'cidadeQueReside' => $this->cidadeQueReside,
             'outrosIdiomas' => $this->outrosIdiomas,
             'deficitAtencao' => $this->deficitAtencao,
             'anorexiaNervosa' => $this->anorexiaNervosa,
             'transtornoAnsiedade' => $this->transtornoAnsiedade,
             'autismoNivel1' => $this->autismoNivel1,
             'transtornoBipolar' => $this->transtornoBipolar,
             'depressao' => $this->depressao,
             'transtornoHistrionico' => $this->transtornoHistrionico,
             'transtornoAnancastico' => $this->transtornoAnancastico,
             'transtornoIntelectual' => $this->transtornoIntelectual,
             'dificuldadeExpressar' => $this->dificuldadeExpressar,
             'toc' => $this->toc,
             'transtornoDePersonalidade' => $this->transtornoDePersonalidade,
             'fobias' => $this->fobias,
             'esquizofrenia' => $this->esquizofrenia,
             'outroEspecificar' => $this->outroEspecificar,
             'hiperlexia' => $this->hiperlexia,
             'hipercalculia' => $this->hipercalculia,
             'ouvidoAbsoluto' => $this->ouvidoAbsoluto,
             'talentoPintar' => $this->talentoPintar,
             'faixaSuperiorQI' => $this->faixaSuperiorQI,
             'qtdIrmasBio' => $this->qtdIrmasBio,
             'qtdIrmaosBio' => $this->qtdIrmaosBio,
             'qtdFilhosBio' => $this->qtdFilhosBio,
             'familiaNuclear' => $this->familiaNuclear,
             'diagnosticoParentes' => $this->diagnosticoParentes,
             'filhosSobCuidados' => $this->filhosSobCuidados,
             'descendentesPrecisamAvaliacao' => $this->descendentesPrecisamAvaliacao,
             'filhosComDiagnostico' => $this->filhosComDiagnostico,
             'ocupacaoPrincipal' => $this->ocupacaoPrincipal,
        ]);

        return redirect('/meus-pedidos');
    }

    public function render()
    {
        
        return view('livewire.historico-medico');
    }
}
