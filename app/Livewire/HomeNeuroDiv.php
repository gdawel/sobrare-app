<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GruposDeTestes;
use Livewire\Attributes\Title;
use App\Helpers\GerenciarCarrinho;
use App\Livewire\Layouts\Ecomm\Navbar;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class HomeNeuroDiv extends Component
{
    
    use LivewireAlert;
    public $grupos;

    #[Title('SOBRARE | Neurodiversidade | Loja dos Testes')]
    public function mount() {

        $this->grupos = GruposDeTestes::where('isActive', true)->get();
        //dd($this->grupos);
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
        return view('livewire.home-neuro-div');
    }
}
