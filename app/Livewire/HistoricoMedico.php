<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
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
    
    public  $qtdIrmasBio=0;
    public  $qtdIrmaosBio=0;
    public  $qtdFilhosBio=0;
    public  $familiaNuclear;
    public  $diagnosticoParentes=0;
    public  $filhosSobCuidados=0;
    public  $descendentesPrecisamAvaliacao=0;
    public  $filhosComDiagnostico=0;
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
