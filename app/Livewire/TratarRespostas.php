<?php

namespace App\Livewire;

use App\Models\Testes;
use Livewire\Attributes\On;
use Livewire\Component;

class TratarRespostas extends Component
{
    public $testeId;
    public $numPergunta;

    #[On('testeSelecionado')]
    public function testeSelecionado($testeId) {
        $testeSelecionado = Testes::where('id', $testeId);
        dd($testeSelecionado);
    }
    
    public function render()
    {
        return view('livewire.tratar-respostas');
    }
}
