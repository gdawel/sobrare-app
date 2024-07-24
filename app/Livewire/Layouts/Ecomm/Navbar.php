<?php

namespace App\Livewire\Layouts\Ecomm;

use Livewire\Component;
use Livewire\Attributes\On;
use PhpParser\Node\Expr\FuncCall;
use App\Helpers\GerenciarCarrinho;

class Navbar extends Component
{
    
    public $quantidade_itens = 0;

    public function mount() {
        $this->quantidade_itens = count(GerenciarCarrinho::getCartItemsFromCookie());
    }

    #[On('atualizar-contagem-carrinho')]
    public function atualizarContagemCarrinho($quantidade_itens) {
        $this->quantidade_itens = $quantidade_itens;
    }
    
    public function render()
    {
        return view('livewire..layouts.ecomm.navbar');
    }
}
