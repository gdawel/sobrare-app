<?php

namespace App\Livewire;

use App\Models\OpcoesRespostas;
use App\Models\perguntas;
use Livewire\Component;
use Livewire\Attributes\On;

class MontaPergunta extends Component
{
  
    public $perguntaSel;
    public $opcoesRespostasId;

    #[On('perguntaSelecionada')]
    public function perguntaSelecionada($IdPergunta = null) {

        $this->perguntaSel = OpcoesRespostas::where('grupo_opcoes_respostas_id', $IdPergunta)->get();
        return view('livewire.monta-pergunta');

    }

    public function render($IdPergunta = null)
    {
                
        return view('livewire.monta-pergunta');
    }
}
