<?php

namespace App\Livewire\Layouts\Ecomm;

use Stripe\Stripe;
use App\Models\Orders;
use Livewire\Component;
use Livewire\Attributes\Url;
use Stripe\Checkout\Session;
use Livewire\Attributes\Title;

#[Title('SOBRARE | Neurodiversidade | Pedido Recebido com Sucesso')]
class PedidoSucessoPage extends Component
{
    #[Url]
    public $session_id;
    
    public function render()
    {
        $latest_order = Orders::with('orderclientdetail')
                        ->where('user_id', auth()->user()->id)
                        ->latest()
                        ->first();
                        //dd($latest_order);

        if ($this->session_id) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $session_info = Session::retrieve($this->session_id);
            //dd($session_info);
            if ($session_info->payment_status == 'paid') {
                $latest_order->paymentStatus = 'pago';
                $latest_order->orderStatus = 'concluido';
                $latest_order->save();

            } else {
                $latest_order->paymentStatus = 'falhou';
                $latest_order->orderStatus = 'cancelado';
                $latest_order->save();
            }

        }
                        

        
        return view('livewire.layouts.ecomm.pedido-sucesso-page', [
            'order' => $latest_order,
        ]);
    }
}
