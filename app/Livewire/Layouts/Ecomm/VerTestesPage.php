<?php

namespace App\Livewire\Layouts\Ecomm;

use App\Models\ControleRelatorios;
use App\Models\Orders;
use Livewire\Component;
use App\Models\Orderitems;
use Livewire\Attributes\Title;
use App\Models\Orderclientdetails;

/* 
    Esta classe (dentro desse componente Livewire) foi inicialmente copiada da PedidosDetalhesPage.
    Porém, para ter maior controle na página "Meus Pedidos", o botão de acesso (Ver Testes) de acesso 
    a esta classe só será exibido se o pedido estiver pago.
*/

#[Title('SOBRARE | Neurodiversidade | Ver Testes')]
class VerTestesPage extends Component
{
    public $order_id;
    public $itensDoPedido=[];
    public $pedido;
    public $detalhesCliente;
    public $temHistoricoMedico=[];
    public $statusControleRelatorio;

    public function mount($order_id) {
        $this->order_id = $order_id;
        // $this->statusControleRelatorio = ControleRelatorios::find($orderItem_id);

    }

    public function render()
    {
        // Marcar o primeiro "novo" teste como "iniciado, para liberar para responder no blade.
        // Caso já exista um teste marcado como iniciado, não será mudado o status de nenhum teste. 
        $buscarTodosOsItensDoPedido = Orderitems::with('testes')
                        ->where('orders_id', $this->order_id)
                        ->get();
        $contaIniciado = 0;
        foreach ($buscarTodosOsItensDoPedido as $cadaItemDoPedido) {
            
                if($cadaItemDoPedido->testeStatus == 'iniciado') {
                    $contaIniciado = 1;
                    // Já existe um teste iniciado. Não alterar status de nenhum item.
                }
            }
        
        if ($contaIniciado == 0) { 
            $buscarPrimeiroItemNovo = Orderitems::with('testes')
                        ->where('orders_id', $this->order_id)
                        ->where('testeStatus', 'novo')
                        ->first();
            if($buscarPrimeiroItemNovo) {              
                Orderitems::where('id', $buscarPrimeiroItemNovo->id)->update(['testeStatus' => "iniciado"]);
            }
        }
        
        
        $this->pedido = Orders::where('id', $this->order_id)->first();
        $this->detalhesCliente = Orderclientdetails::where('orders_id', $this->order_id)->first();
        $this->temHistoricoMedico = Orders::with('historicomedico')->where('id', $this->order_id)->first();

        //dd($this->temHistoricoMedico);
        
            $this->itensDoPedido = Orderitems::with('testes')
                            ->where('orders_id', $this->order_id)
                            ->get();
            //dd($itensDoPedido);
            
        
        return view('livewire.layouts.ecomm.ver-testes-page');
    }
}
