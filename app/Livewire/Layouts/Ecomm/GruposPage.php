<?php

namespace App\Livewire\Layouts\Ecomm;

use Livewire\Component;
use App\Models\GruposDeTestes;
use App\Helpers\GerenciarCarrinho;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class GruposPage extends Component
{
    use LivewireAlert;
    
    public $grupos;

    public function mount() {

        $this->grupos = GruposDeTestes::where('isactive', true)->get();
        
    }

    // adicionar o grupo ao carrinho
    public function adicionarAoCarrinho( $grupo_id ) {
        $quantidade_itens = GerenciarCarrinho::addItemToCart($grupo_id);

        $this->dispatch('atualizar-contagem-carrinho', quantidade_itens: $quantidade_itens)->to(Navbar::class);

        $this->alert('success', 'Grupo Adicionado ao Carrinho', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            ]);
    }

    public function render()
    {
        return view('livewire.layouts.ecomm.grupos-page');
    }
}
