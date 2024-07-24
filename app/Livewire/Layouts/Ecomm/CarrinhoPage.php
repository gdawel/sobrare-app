<?php

namespace App\Livewire\Layouts\Ecomm;

use App\Helpers\GerenciarCarrinho;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('SOBRARE | Neurodiversidade | Carrinho de Compras')]
class CarrinhoPage extends Component
{
    public $cart_items = [];
    public $total_geral;

    public function mount() {
        $this->cart_items = GerenciarCarrinho::getCartItemsFromCookie();
        $this->total_geral = GerenciarCarrinho::calcularTotalGeral($this->cart_items);
        //dd($this->total_geral);
    }

    public function removerItem($produto_id) {
        
        $this->cart_items = GerenciarCarrinho::removeCartItem($produto_id);
        $this->total_geral = GerenciarCarrinho::calcularTotalGeral($this->cart_items);

         $this->dispatch('atualizar-contagem-carrinho', quantidade_itens: count($this->cart_items))->to(Navbar::class);
    }

    public function render()
    {
        return view('livewire.layouts.ecomm.carrinho-page');
    }
}
