<?php

namespace App\Livewire;

use App\Livewire\Relatorios\ControladorRelatorios;
use App\Models\User;
use App\Models\Orders;
use App\Models\Testes;
use Livewire\Component;
use App\Models\Perguntas;
use App\Models\Orderitems;
use App\Models\Useranswers;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use App\Models\OpcoesRespostas;
use App\Models\GrupoOpcoesResposta;
use App\Livewire\Relatorios\RelatAutopercepcaoDoStress;

class MontaPergunta extends Component
{
  
    public $clientesTodos;
    public $cliente;
    public $clienteSelecionado;
    public $sexoCliente;
    public $dadosCliente;
    public $testesDoCliente;
    public $testes;
    public $itensPedido;
    public $testeId;
    public $orderId;
    public $testeSelecionado;
    public $perguntas;
    public $opcoesResposta;

    public $acionarResponder = false;

    public $qualRelatorio;
    public $tituloRelatorio;
    public $resultadoTeste;

    public $qualCliente;
    
    #[Url]
    public $cctt;
    #[Url]
    public $ccxx;

    //#[On('clienteSelecionado')]
    public function mount() {

        /*  cctt: código do teste testes_id
            ccxx: código do pedido orders_is
        */

        $this->testeId = $this->cctt;
        $this->orderId = $this->ccxx;

        dd($this->testeId);

       /*  $this->clienteSelecionado = Orders::whereHas('user', function($query) {
                                $query->where('users.id', $this->clienteSelecionado);
                            })->first(); */

        $userId = auth()->user()->id;
        $this->dadosCliente = User::where('id', $userId)->first();
        $this->sexoCliente = $this->dadosCliente->sexo_biologico;

        $this->testes = Testes::whereHas('orderitens', function($query) {
                                $query->where('orders_id', $this->clienteSelecionado->id);
                                })->get();
// Marcar o primeiro "novo" teste como "iniciado, para liberar para responder no blade.
// Caso já exista um teste marcado como iniciado, não será mudado o status de nenhum teste. 
        $buscarTodosOsItensDoPedido = Orderitems::with('testes')
                        ->where('orders_id', $this->clienteSelecionado->id)
                        ->get();
    /* 
    1. Se o cliente estiver acessando o 'responder-teste' pela primeira vez, todos os testes estarão como 'novo'
        ==> Se fizer um foreach contando testes diferentes de 'novo', o contador vai ficar zerado.
    2. Se não for a primeira vez, pode haver status = novo, iniciado, concluido. Neste caso, contador > 0:
        ==> Buscar teste com status = 'iniciado'. Se encontrar, não se altera nada no status.
    
    */
        $contaIniciado = 0;
        foreach ($buscarTodosOsItensDoPedido as $cadaItemDoPedido) {
            
                if($cadaItemDoPedido->testeStatus == 'iniciado') {
                    $contaIniciado = 1;
                    // Já existe um teste iniciado. Não alterar status de nenhum item.
                }
            }
        
        if ($contaIniciado == 0) { 
            $buscarPrimeiroItemNovo = Orderitems::with('testes')
                        ->where('orders_id', $this->clienteSelecionado->id)
                        ->where('testeStatus', 'novo')
                        ->first();
            if($buscarPrimeiroItemNovo) {              
                Orderitems::where('id', $buscarPrimeiroItemNovo->id)->update(['testeStatus' => "iniciado"]);
            }
        }

        $this->itensPedido = Orderitems::with('testes')->where('orders_id', $this->clienteSelecionado->id)->get();
        
                        
        //Orderitems::where('id', $statusTeste->id)->update(['testeStatus' => "iniciado"]);

        //dd($this->clienteSelecionado);
        //dd($this->dadosCliente);
        //dd($this->itensPedido);
        return view('livewire.monta-pergunta', [
            'dadosCliente' => $this->dadosCliente
        ]);

    }

    public function montateste($testeId) {

        
        $this->testeSelecionado = Testes::where('id', $testeId)->first();
        $this->perguntas = Perguntas::with('grupoOpcoesRespostas')->where('testes_id', $testeId)->first();
        
        $this->opcoesResposta = OpcoesRespostas::where('grupo_opcoes_respostas_id', $this->perguntas->grupo_opcoes_respostas_id)->get();
        /* $this->testeSelecionado = Perguntas::with('grupoOpcoesRespostas')
        ->where('grupo_opcoes_respostas_id', 'grupoOpcoesRespostas.id')                            
        ->get(); */
        //dd($this->opcoesResposta);
        //$this->testeId = $testeId;
        $this->dispatch('testeSelecionado', testeSelecionado: $this->testeSelecionado,
                                            itensPedido: $this->itensPedido,
                                            pedidoCliente: $this->clienteSelecionado,
                                            sexoCliente: $this->sexoCliente,)->to(ResponderTeste::class);
        return view('livewire.responder-teste', [
            'testeSelecionado' => $this->testeSelecionado,
            //'perguntas' => $this->perguntas,
            //'opcoesResposta' => $this->opcoesResposta
        ]);

    }

    public function updatedqualCliente() {

       $this->reset();
    }

    public function relatorios($qualRelatorio) {

        // 13/07/2024 - Aqui começo a testar a formatação do relatório.
        $parametrosParaRelatorios = [
            'user_id' => $this->dadosCliente->id,
            'order_id' => $this->clienteSelecionado->id,
            'orderItem_id' => $this->itensPedido[0]->id,
            'teste_id' => $this->itensPedido[0]->testes_id
        ];
        
        /* if($qualRelatorio == 4) {
            //dd($qualRelatorio);
            
            $this->redirect('/ordenacao-assuntos');
        } */
        
        $this->resultadoTeste = Orderitems::with('useranswers')
                                        ->where('orders_id',$this->clienteSelecionado->id)
                                        ->where('testes_id',$qualRelatorio)
                                        ->get();
        //dd($this->resultadoTeste);
        /* ('orders_id',$this->clienteSelecionado->id)
                                        ->where('testes_id', $qualRelatorio)->first(); */
        //$useranswerPerguntas = $numeroItemPedido->useranswers->pergunta_id;
        
        /* $qualRelatorio = [
            'pedidoCliente' => $this->clienteSelecionado,
            'dadosCliente' => $this->dadosCliente,
            'testeSelecionado' => $qualRelatorio,
            'itensPedido' => $this->itensPedido

        ]; */
        //dd($qualRelatorio);
        
        $this->dispatch('resultadoTeste', orders_id: $this->clienteSelecionado->id,
                                          testes_id: $qualRelatorio,
                                          parametrosParaRelatorios: $parametrosParaRelatorios )
                /* ->to(RelatAutopercepcaoDoStress::class); */
                ->to(ControladorRelatorios::class);
        //dd($this->resultadoTeste);
        

        

        

        

    }

    public function render()
    {
                
        return view('livewire.monta-pergunta', [
            'dadosCliente' => $this->dadosCliente
        ]);

    }
}
