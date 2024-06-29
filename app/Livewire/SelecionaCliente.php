<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Computed;

class SelecionaCliente extends Component
{
    public $clientesTodos;
    public $clienteSelecionado;

    public $mostraMontaPergunta;

    public function updatedclienteSelecionado() {

        //$this->clienteSelecionado = $this->clientesTodos[0];
        //$this->dispatch('clienteSelecionado', clienteSelecionado: $this->clienteSelecionado);
        //dd($this->clienteSelecionado);
        $this->mostraMontaPergunta = true;
        
        
    }

    #[Computed()]
    public function mount() {

        $this->clientesTodos = User::whereHas('orders')->get();

        

        //dd($this->clientesTodos);
        
        

    }
    
    public function render()
    {
        return view('livewire.seleciona-cliente');
    }
}
