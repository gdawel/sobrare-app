<?php

namespace App\Livewire\Layouts\Ecomm;

use App\Models\Orderclientdetails;
use Livewire\Component;
use App\Models\Orderitems;
use App\Models\Orders;
use Livewire\Attributes\Title;


#[Title('SOBRARE | Neurodiversidade | Detalhes do Pedido')]
class PedidoDetalhesPage extends Component
{
    
    public $order_id;
    public $itensDoPedido=[];
    public $pedido;
    public $detalhesCliente;
    public $temHistoricoMedico=[];

    public function mount($order_id) {
        $this->order_id = $order_id;
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
        if ($this->pedido->paymentStatus == 'pago') {
            $this->itensDoPedido = Orderitems::with('testes')
                            ->where('orders_id', $this->order_id)
                            ->get();
            //dd($itensDoPedido);
            
        }
        return view('livewire.layouts.ecomm.pedido-detalhes-page');
    }

    
}
