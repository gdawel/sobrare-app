<?php

namespace App\Livewire;

use App\Models\Testes;
use Livewire\Component;
use App\Models\Perguntas;
use App\Models\Orderitems;
use Livewire\Attributes\On;
use App\Models\OpcoesRespostas;
use Livewire\Attributes\Validate;

class ResponderTeste extends Component
{
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
    
    public $complementos = 'N';
    
    #[Validate('required_if:complementos,S', message: 'Por favor, selecione uma das opções complementares acima.')] 
    public $opcRespCheckbox = [];   
    
    #[Validate('required_if:tipoOpcaoResposta,C', message: 'Por favor, selecione uma das opções complementares acima.')] 
    public $opcRespIntensidade;
    
    public $comentarios = 'N';
    public $comentariosCliente;

    public $totalPerguntas = 0;
    public $sexoCliente;
    

    #[On('testeSelecionado')]
    public function montar($testeSelecionado, $itensPedido, $sexoCliente){
        $this->testeSelecionado = $testeSelecionado;
        $this->itensPedido = $itensPedido;
        $this->sexoCliente = $sexoCliente;

        //Orderitems::where('testes_id', $testeSelecionado)->update(['testeStatus' => "iniciado"]);
        // Saber qual o # do item do pedido para gravar as respostas com a referência (FK) do pedido a que se refere
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
        $this->opcoesRespostasId = null;
       
        //$this->perguntas = Perguntas::with('grupoOpcoesRespostas')

        // LEMBRAR DE SELECIONAR O SEXO ANTES DE GERAR AS PERGUNTAS

        $this->perguntas = Perguntas::with('grupoOpcoesRespostas')
                            ->where('testes_id', $this->testeSelecionado['id'])
                            ->where('sequencia', $this->qualPergunta)
                            ->where(function ($query) {
                                $query->where('sexo', 'I')
                                ->orWhere('sexo', $this->sexoCliente);
                            })
                            ->get();
        /*
            Dawel: devido a estar selecionando um único registro no this->perguntas,
            na variável abaixo vai ser selecionada apenas o grupo da instãncia [0]. 
        */
        $grupoRespostas = $this->perguntas[0]->grupo_opcoes_respostas_id;
        $this->totalPerguntas = Perguntas::where('testes_id', $this->testeSelecionado['id'])
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
        }
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
        
        

        // ANTES DE IR PARA A PRÓXIMA PERGUNTA, SALVAR A RESPOSTA NO BD.

        $this->qualPergunta++;
        $this->opcoesRespostasId = null;
        $this->respostaprimaria = null;
        $this->opcRespIntensidade = null;
        $this->opcRespCheckbox = [];
        $this->complementos = null;
        $this->perguntas = Perguntas::with('grupoOpcoesRespostas')
                            ->where('testes_id', $this->testeSelecionado['id'])
                            ->where('sequencia', $this->qualPergunta)
                            ->get();
        /*
            Dawel: devido a estar selecionando um único registro no this->perguntas,
            na variável abaixo vai ser selecionada apenas o grupo da instãncia [0]. 
        */
        $grupoRespostas = $this->perguntas[0]->grupo_opcoes_respostas_id;
        $this->totalPerguntas = Perguntas::where('testes_id', $this->testeSelecionado['id'])->count();
        //dd($this->perguntas);
        $this->opcoesResposta = OpcoesRespostas::where('grupo_opcoes_respostas_id', $grupoRespostas)->get();
        $this->tipoOpcaoResposta = $this->opcoesResposta[0]->tipoOpcaoResposta;
        //dd($this->opcoesResposta);
        // Checar se alguma das Opções de Respostas requer resposta complementar para Intensidade
        foreach ( $this->opcoesResposta as $cadaOpcaoResposta) {
            if($cadaOpcaoResposta->tipoOpcaoResposta == 'C') {
                $this->tipoOpcaoResposta = 'C';
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
        $this->opcRespCheckbox = [];
        $this->opcRespIntensidade = null;
        $this->comentariosCliente = null;
        //$this->respostaprimaria = null;
        
        
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
        
        $this->redirect('tst-responder');
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
