<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Descendencias;
use App\Models\Estados;
use App\Models\Generos;
use App\Models\GrausEscolares;
use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Historicomedicos;
use Livewire\Attributes\Validate;

class HistoricoMedico extends Component
{
   /* #[Validate('required|date', Carbon::now()-6575, message: 'Este teste é para maiores de 18 anos')] */ 
    #[Validate('required', message: 'Por favor, informe a Data de Nascimento')] 
    public	$dataNasc;
    
    #[Validate('required', message: 'Por favor, selecione o sexo biológico atribuído a você')] 
    public  $sexoBiologico;
    #[Validate('required', message: 'Por favor, selecione o Estado em que você nasceu')] 
    public  $estadoNasc;
    #[Validate('required', message: 'Por favor, selecione o gênero')] 	     
    public	$genero;
    #[Validate('required', message: 'Por favor, selecione sua etnia')] 
    public  $etnia;
    #[Validate('required', message: 'Por favor, selecione qual a sua mão mais ágil')] 
    public  $maoMaisAgil;
    #[Validate('required', message: 'Por favor, informe a cidade em que reside atualmente')] 
    public  $cidadeQueReside;
    public  $outrosIdiomas;
    #[Validate('required', message: 'Por favor, selecione seu grau escolar')] 
    public	$grauEscolar;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $deficitAtencao;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $anorexiaNervosa;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $transtornoAnsiedade;
    
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $autismoNivel1;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $transtornoBipolar;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $depressao;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $transtornoHistrionico;
    
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $transtornoAnancastico;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $transtornoIntelectual;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $dificuldadeExpressar;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $toc;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $transtornoDePersonalidade;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $fobias;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $esquizofrenia;
    #[Validate('max:250', message: 'Por favor, limite seu comentário a 250 caracteres.')] 
    public  $outroEspecificar;

    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $hiperlexia;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $hipercalculia;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $ouvidoAbsoluto;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $talentoPintar;
    #[Validate('required', message: 'Por favor, selecione Sim ou Não.')] 
    public  $faixaSuperiorQI;
    
    public  $qtdIrmasBio=0;
    public  $qtdIrmaosBio=0;
    public  $qtdFilhosBio=0;
    #[Validate('required', message: 'Por favor, selecione uma opção')]
    public  $familiaNuclear;
    public  $diagnosticoParentes=0;
    public  $filhosSobCuidados=0;
    public  $descendentesPrecisamAvaliacao=0;
    public  $filhosComDiagnostico=0;
    #[Validate('required', message: 'Por favor, informe sua ocupação')] 
    #[Validate('max:60', message: 'Máximo de caracteres permitido nesta informação é 60 caracteres')] 
    public  $ocupacaoPrincipal; 
    public  $descendencias;
    public  $estados;
    public  $generos; 
    public  $grausEscolares; 


    #[Url]
    public  $order_id;

    public function mount() {
        /* 
            Selecionar as informações necessárias ao preenchimento do Histórico Médico 
        */
        $this->descendencias = Descendencias::all();
        $this->estados = Estados::all();
        $this->generos = Generos::all();
        $this->grausEscolares = GrausEscolares::all();
    }
    
    public function salvarHistorico(){
        //dd($this->diagnosticoParentes);
        // Eventual necessidade de consistência de data. Ex.: maiores de 18 anos. Não foi implementado.
        $date2 = Carbon::parse($this->dataNasc);
        $date1 = Carbon::now();
        $days = $date2->diffInDays($date1);

        $resultado = "Data2(Nasc)=".$date2." | Data1(Hoje):".$date1." | #Dias: ".$days;
        //dd($resultado);
        $this->validate();
        
        // Atualizar informações estáticas (não mudam com o passar do tempo) do cliente
        $cliente = User::where('id', auth()->user()->id)->first();
        $cliente->data_nascimento = $this->dataNasc;
        $cliente->sexo_biologico = $this->sexoBiologico;
        $cliente->estado_nascimento = $this->estadoNasc;
        $cliente->save();
        
        // Criar registro de informações dinâmicas (Podem mudar com o passar do tempo) do cliente
        HistoricoMedicos::create([
             'orders_id' => $this->order_id,
             'genero' => $this->genero,
             'etnia' => $this->etnia,
             'maoMaisAgil' => $this->maoMaisAgil,
             'cidadeQueReside' => $this->cidadeQueReside,
             'outrosIdiomas' => $this->outrosIdiomas,
             'grauEscolar' => $this->grauEscolar,
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

    public function somar($qualcampo) {

       
        switch ($qualcampo) {

            case 'qtdIrmasBio':
                $this->qtdIrmasBio++;
            break;

            case 'qtdIrmaosBio':
                $this->qtdIrmaosBio++;
            break;
            case 'qtdFilhosBio':
                $this->qtdFilhosBio++;
            break;
            
            case 'diagnosticoParentes':
                $this->diagnosticoParentes++;
            break;
            case 'filhosSobCuidados':
                $this->filhosSobCuidados++;
            break;
            case 'descendentesPrecisamAvaliacao':
                $this->descendentesPrecisamAvaliacao++;
            break;
            case 'filhosComDiagnostico':
                $this->filhosComDiagnostico++;
            break;
            default;
        }
    }

        public function diminuir($qualcampo) {

        switch ($qualcampo) {

            case 'qtdIrmasBio':
                $this->qtdIrmasBio > 0 ? $this->qtdIrmasBio-- : $this->qtdIrmasBio = 0;
            break;

            case 'qtdIrmaosBio':
                $this->qtdIrmaosBio > 0 ? $this->qtdIrmaosBio-- : $this->qtdIrmaosBio = 0;
            break;
            case 'qtdFilhosBio':
                $this->qtdFilhosBio > 0 ? $this->qtdFilhosBio-- : $this->qtdFilhosBio = 0;
            break;
            
            case 'diagnosticoParentes':
                $this->diagnosticoParentes > 0 ? $this->diagnosticoParentes-- : $this->diagnosticoParentes = 0;
            break;
            case 'filhosSobCuidados':
                $this->filhosSobCuidados > 0 ? $this->filhosSobCuidados-- : $this->filhosSobCuidados = 0;
            break;
            case 'descendentesPrecisamAvaliacao':
                $this->descendentesPrecisamAvaliacao > 0 ? $this->descendentesPrecisamAvaliacao-- : $this->descendentesPrecisamAvaliacao = 0;
            break;
            case 'filhosComDiagnostico':
                $this->filhosComDiagnostico > 0 ? $this->filhosComDiagnostico-- : $this->filhosComDiagnostico = 0;
            break;
            default;
        }
    }

    public function render()
    {
        
        return view('livewire.historico-medico');
    }
}
