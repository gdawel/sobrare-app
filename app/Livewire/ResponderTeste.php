<?php

namespace App\Livewire;

use App\Models\Testes;
use Livewire\Component;
use App\Models\Perguntas;
use App\Models\Orderitems;
use App\Models\Useranswers;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use App\Models\OpcoesRespostas;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ResponderTeste extends Component
{
    use LivewireAlert;
    
    public $testeSelecionado;
    public $perguntas;
    public $itensPedido;
    public $itemPedidoId;
    public $perguntaId;
    public $qualPergunta = 1;
    public $opcoesResposta;
    public $tipoOpcaoResposta = 'N';

    #[Validate('required', message: 'Por favor, selecione uma das opções acima.')] 
    public $opcoesRespostasId;

    public $respostaprimaria;
    public $habilitarBotaoResposta = false;
    
    public $complementos = 'N';

    public $inputType;

    public $validar_complemento;
    public $validar_intensidade;
    
    #[Validate('required_if:validar_complemento,S', message: 'Por favor, selecione uma ou mais das opções complementares acima.')] 
    public $opcRespCheckbox = [];   
    
    #[Validate('required_if:validar_intensidade,S', message: 'Por favor, selecione uma das opções complementares acima.')] 
    public $opcRespIntensidade;
    
    public $comentarios = 'N';

    //#[Validate('max:250', message: 'Tamanho máximo do comentário é de 250 caracteres')]
    public $comentariosCliente;

    public $totalPerguntas = 0;
    public $pedidoCliente;
    public $sexoCliente;
    public $nomeTeste;

    #[Url]
    public $cctt;
    #[Url]
    public $ccxx;
    #[Url]
    public $ccii;
    

    #[On('testeSelecionado')]
    /* Dawel: Substituído em 29/07/2024 public function montar($testeSelecionado, $itensPedido, $pedidoCliente, $sexoCliente){
    */
    public function mount(){
        
        /*  cctt: código do teste testes_id
            ccxx: código do pedido orders_id
            ccii: códito do item do pedido orderItems_id
        */

        $this->testeSelecionado = $this->cctt;
        $this->pedidoCliente = $this->ccxx;
        $this->itemPedidoId = $this->ccii;
        $this->sexoCliente = auth()->user()->sexo_biologico;
        $this->nomeTeste = Testes::where('id', $this->testeSelecionado)->first('nomeTeste')->nomeTeste;

        /* $paramentros = "Teste: " . $this->testeSelecionado . " | Pedido: " . $this->pedidoCliente 
                        . " | Item ID: " . $this->ccii . " | Sexo: " . auth()->user()->sexo_biologico;
        dd($paramentros);
 */
        /*  Dawel - removido em 29/07/2024
        $this->testeSelecionado = $testeSelecionado;
        $this->itensPedido = $itensPedido;
        $this->sexoCliente = $sexoCliente;
        $this->pedidoCliente = $pedidoCliente;
        //dd($this->pedidoCliente); */

        //Orderitems::where('testes_id', $testeSelecionado)->update(['testeStatus' => "iniciado"]);
        // Saber qual o # do item do pedido para gravar as respostas com a referência (FK) do pedido a que se refere
        /* Dawel: retirado em 29/07/2024
        foreach ($this->itensPedido as $item) {
            if ($item['testes_id'] == $testeSelecionado['id']) {
            $this->itemPedidoId = $item['id'];
            }
        };
        
        $this->perguntas=null;
        $this->perguntaId=null;
        $this->qualPergunta = 1;
        $this->comentarios = null;
        $this->complementos = null;
        $this->opcoesRespostasId = null; */
       
        //$this->perguntas = Perguntas::with('grupoOpcoesRespostas')

        // LEMBRAR DE SELECIONAR O SEXO ANTES DE GERAR AS PERGUNTAS
        $ultimaPerguntaRespondida = Useranswers::with('ordersItem')
                                                 ->where('orderitems_id', $this->itemPedidoId)
                                                 ->max('sequencia');
        //dd($ultimaPerguntaRespondida);
        
        if($ultimaPerguntaRespondida) {
            $this->qualPergunta = $ultimaPerguntaRespondida + 1;
        } else {
            $this->qualPergunta = 1;
        }

        $temporario = [
            'teste-id' => $this->testeSelecionado,
            'sequencia' => $this->qualPergunta,
            'sexo' => $this->sexoCliente
        ];
        //dd($temporario);

        $this->perguntas = Perguntas::with('grupoOpcoesRespostas')
                            ->where('testes_id', $this->testeSelecionado)
                            ->where('sequencia', $this->qualPergunta)
                            ->where(function ($query) {
                                $query->where('sexo', 'I')
                                ->orWhere('sexo', $this->sexoCliente);
                            })
                            ->get();
        /* ERRO RT001 - Não encontrou o teste acima no DB. Verificar importação das perguntas */

        if($this->perguntas->count() == 0) {

            $this->alert('error', 'Erro Interno n. RT001 - Por favor informe SOBRARE', [
                'position' => 'center',
                'timer' => 5000,
                'toast' => true,
                'timerProgressBar' => true,
                ]);
            return;
        }
        //dd($this->perguntas);
        /*
            Dawel: devido a estar selecionando um único registro no this->perguntas,
            na variável abaixo vai ser selecionada apenas o grupo da instãncia [0]. 
        */
        $grupoRespostas = $this->perguntas[0]->grupo_opcoes_respostas_id;
        
        $this->totalPerguntas = Perguntas::where('testes_id', $this->testeSelecionado)
                                           ->where(function ($query) {
                                                $query->where('sexo', 'I')
                                                ->orWhere('sexo', $this->sexoCliente);
                            })
                                           ->count();
        //dd($this->perguntas);
        $this->opcoesResposta = OpcoesRespostas::where('grupo_opcoes_respostas_id', $grupoRespostas)->get();
        // Checar se alguma das Opções de Respostas requer resposta complementar para Intensidade
        foreach ( $this->opcoesResposta as $cadaOpcaoResposta) {
            if($cadaOpcaoResposta->tipoOpcaoResposta == 'C') {
                $this->tipoOpcaoResposta = 'C';
            }
            if($cadaOpcaoResposta->tipoOpcaoResposta == 'I') {
                $this->tipoOpcaoResposta = 'I';
            }
            if($cadaOpcaoResposta->inputType == 'Checkbox') {
                $this->inputType = 'Checkbox';
            }
            if($cadaOpcaoResposta->inputType == 'Select') {
                $this->inputType = 'Select';
            }
        }
        //dd($this->opcoesResposta);
        //$this->tipoOpcaoResposta = $this->opcoesResposta[0]->tipoOpcaoResposta;

        //dd($this->tipoOpcaoResposta);
        
    }

    public function proximaPergunta($perguntaId){

        
        $this->validate();
        


        $retornoForm = [
            'itemPedidoId' => $this->itemPedidoId,
            'perguntaID' => $perguntaId,
            'respostaP' => $this->opcoesRespostasId,
            'respostaC' => $this->opcRespCheckbox,
            'intensidade' => $this->opcRespIntensidade,
            'comentarios' => $this->comentariosCliente
        ];
        /* if($this->qualPergunta == 2) {
            dd($retornoForm);
        } */
        
        // Gravar as respostas de cada pergunta
        Useranswers::create([
            'users_id' => auth()->user()->id,
            'orderitems_id' => $this->itemPedidoId,
            'testes_id' => $this->testeSelecionado,
            'pergunta_id' => $perguntaId,
            'sequencia' => $this->qualPergunta,
            'opcoes_respostas_id' => $this->opcoesRespostasId,
            'opcRespCheckbox' => json_encode($this->opcRespCheckbox),
            'opcRespIntensidade' => $this->opcRespIntensidade,
            'comentariosCliente' => $this->comentariosCliente
        ]);

        // ANTES DE IR PARA A PRÓXIMA PERGUNTA, SALVAR A RESPOSTA NO BD.

        $this->qualPergunta++;
        $this->opcoesRespostasId = null;
        $this->respostaprimaria = null;
        $this->opcRespIntensidade = null;
        $this->opcRespCheckbox = [];
        $this->complementos = null;
        $this->habilitarBotaoResposta = false;
        $this->perguntas = Perguntas::with('grupoOpcoesRespostas')
                            ->where('testes_id', $this->testeSelecionado)
                            ->where('sequencia', $this->qualPergunta)
                            ->get();
        /*
            Dawel: devido a estar selecionando um único registro no this->perguntas,
            na variável abaixo vai ser selecionada apenas o grupo da instãncia [0]. 
        */
        $grupoRespostas = $this->perguntas[0]->grupo_opcoes_respostas_id;
        /* Retirado Dawel: 29/07/2024
            $this->totalPerguntas = Perguntas::where('testes_id', $this->testeSelecionado)->count(); */
        //dd($this->perguntas);
        $this->opcoesResposta = OpcoesRespostas::where('grupo_opcoes_respostas_id', $grupoRespostas)->get();
        $this->tipoOpcaoResposta = $this->opcoesResposta[0]->tipoOpcaoResposta;
        //dd($this->opcoesResposta);
        // Checar se alguma das Opções de Respostas requer resposta complementar para Intensidade
        foreach ( $this->opcoesResposta as $cadaOpcaoResposta) {
            if($cadaOpcaoResposta->tipoOpcaoResposta == 'C') {
                $this->tipoOpcaoResposta = 'C';
            }
            if($cadaOpcaoResposta->tipoOpcaoResposta == 'I') {
                $this->tipoOpcaoResposta = 'I';
            }
            if($cadaOpcaoResposta->inputType == 'Checkbox') {
                $this->inputType = 'Checkbox';
            }
            if($cadaOpcaoResposta->inputType == 'Select') {
                $this->inputType = 'Select';
            }
        }
        
        
    }
    
    public function updatedopcoesRespostasId() {

        $opcaoSel = OpcoesRespostas::where('id', $this->opcoesRespostasId)->first();
       /* if($this->qualPergunta == 2) {
        dd($opcaoSel);
       } */
        $this->comentarios = $opcaoSel->requer_comentarios;
        $this->complementos = $opcaoSel->requer_complemento;
        $this->tipoOpcaoResposta = $opcaoSel->tipoOpcaoResposta;
        $this->validar_complemento = $opcaoSel->validar_complemento;
        $this->validar_intensidade = $opcaoSel->validar_intensidade;
        $this->opcRespCheckbox = [];
        $this->opcRespIntensidade = null;
        $this->comentariosCliente = null;
        //$this->respostaprimaria = null;

        if($this->validate()) {
            $this->habilitarBotaoResposta = true;
        }

        /* $this->dispatch('parametros', 
            comentarios: $this->comentarios,
            complementos: $this->complementos,
            tipoOpcaoResposta: $this->tipoOpcaoResposta,
            opcRespCheckbox: $this->opcRespCheckbox,
            opcRespIntensidade: $this->opcRespIntensidade,
            respostaprimaria: $this->respostaprimaria

            )->to(TratarRespostas::class); */
        
        
    }

    public function updatedopcRespCheckbox() {
        if($this->validate()) {
            $this->habilitarBotaoResposta = true;
        }
    }

    public function updatedopcRespIntensidade() {
        if($this->validate()) {
            $this->habilitarBotaoResposta = true;
        }
    }

    public function finalizarTeste($perguntaId) {

        $retornoForm = [
            'itemPedidoId' => $this->itemPedidoId,
            'perguntaID' => $perguntaId,
            'respostaP' => $this->opcoesRespostasId,
            'respostaC' => $this->opcRespCheckbox,
            'intensidade' => $this->opcRespIntensidade,
            'comentarios' => $this->comentariosCliente
        ];

        // Gravar as respostas de cada pergunta
        Useranswers::create([
            'users_id' => auth()->user()->id,
            'orderitems_id' => $this->itemPedidoId,
            'testes_id' => $this->testeSelecionado,
            'pergunta_id' => $perguntaId,
            'sequencia' => $this->qualPergunta,
            'opcoes_respostas_id' => $this->opcoesRespostasId,
            'opcRespCheckbox' => json_encode($this->opcRespCheckbox),
            'opcRespIntensidade' => $this->opcRespIntensidade,
            'comentariosCliente' => $this->comentariosCliente
        ]);

        Orderitems::where('id', $this->itemPedidoId,)->update(['testeStatus' => 'concluido']);

        //dd($retornoForm);

        $this->perguntas=null;
        $this->perguntaId=null;
        $this->qualPergunta = 1;
        $this->comentarios = null;
        $this->complementos = null;
        $this->opcoesRespostasId = null;
        
        $this->opcoesRespostasId = null;
        $this->respostaprimaria = null;
        $this->opcRespIntensidade = null;
        $this->opcRespCheckbox = [];
        
        $this->redirect('/meus-pedidos');
    }

    public function render()
    {
        return view('livewire.responder-teste', [
            'testeSelecionado' => $this->testeSelecionado,
            'perguntas' => $this->perguntas,
            'opcoesResposta' => $this->opcoesResposta
        ]);
    }
}
