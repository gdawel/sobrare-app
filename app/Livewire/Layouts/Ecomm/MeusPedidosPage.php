<?php

namespace App\Livewire\Layouts\Ecomm;

use App\Models\Orders;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('SOBRARE | Neurodiversidade | Meus Pedidos')]
class MeusPedidosPage extends Component
{
    use WithPagination;

    public function render()
    {
        $meus_pedidos = Orders::where('user_id', auth()->user()->id)->latest()->paginate(6);
        return view('livewire.layouts.ecomm.meus-pedidos-page', [
            'pedidos' => $meus_pedidos, 
        ]);
    }
}
