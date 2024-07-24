<?php

namespace App\Livewire\Layouts\Ecomm;

use App\Helpers\GerenciarCarrinho;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('SOBRARE | Neurodiversidade | Finalizar Compra')]
class CheckoutPage extends Component
{
    
    public $nome;
    public $sobrenome;
    public $telefone;
    public $endereco;
    public $cidade;
    public $estado;
    public $cep;
    public $forma_pagamento;
    

    public function confirmarPedido(){
        
        $this->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'forma_pagamento' => 'required',
        ],
        [
            'nome.required' => 'Preencha o seu Nome',
            'sobrenome.required' => 'Preencha o seu Sobrenome',
            'telefone' => 'Preencha o telefone com DDD',
            'endereco' => 'Preencha endereço de cobrança completo',
            'cidade' => 'Informe a Cidade',
            'estado' => 'Selecione o Estado (UF)',
            'cep' => 'Informe o CEP',
            'forma_pagamento' => 'Selecione a Forma de Pagamento',
        ]);

    }
    
    public function render()
    {
        $cart_items = GerenciarCarrinho::getCartItemsFromCookie();
        $total_geral = GerenciarCarrinho::calcularTotalGeral($cart_items);
        return view('livewire.layouts.ecomm.checkout-page', [
            'cart_items' => $cart_items,
            'total_geral' => $total_geral
        ]);
    }
}
