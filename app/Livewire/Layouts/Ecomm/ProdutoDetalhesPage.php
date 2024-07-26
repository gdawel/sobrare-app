<?php

namespace App\Livewire\Layouts\Ecomm;

use Livewire\Component;
use App\Models\GruposDeTestes;
use Livewire\Attributes\Title;
use App\Helpers\GerenciarCarrinho;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProdutoDetalhesPage extends Component
{
    use LivewireAlert;
    public $grupoSelecionado;
    
    #[Title('SOBRARE | Neurodiversidade | Loja: Detalhe do Produto')]
    public function mount($slug) {

        $this->grupoSelecionado = GruposDeTestes::with('testes')->where('slug', $slug)->first();
        //dd($this->grupoSelecionado);
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
        return view('livewire..layouts.ecomm.produto-detalhes-page');
    }
}
