<?php

namespace App\Livewire\Layouts\Ecomm;

use App\Models\GruposDeTestes;
use Livewire\Component;

class ProdutoDetalhesPage extends Component
{
    public $grupoSelecionado;
    

    public function mount($slug) {

        $this->grupoSelecionado = GruposDeTestes::where('slug', $slug)->first();
    }
    
    public function render()
    {
        return view('livewire..layouts.ecomm.produto-detalhes-page');
    }
}
