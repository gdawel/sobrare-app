<?php

namespace App\Livewire;

use App\Models\Testes;
use Livewire\Attributes\On;
use Livewire\Component;

class TratarRespostas extends Component
{
   
        public $comentarios; 
        public $complementos;
        public $tipoOpcaoResposta;
        public $opcRespCheckbox;
        public $opcRespIntensidade = null;
        
        public $respostaprimaria = null;

    #[On('parametros')]
    public function testeSelecionado($comentarios, $complementos, $tipoOpcaoResposta, $opcRespCheckbox,
                                     $opcRespIntensidade, $respostaprimaria) {
        
        $this->comentarios = $comentarios;
        $this->complementos = $complementos;
        $this->tipoOpcaoResposta = $tipoOpcaoResposta;
        $this->opcRespCheckbox = json_encode($opcRespCheckbox);
        $this->opcRespIntensidade = $opcRespIntensidade;
        $this->respostaprimaria = $respostaprimaria;
        
    }
    
    public function render()
    {
        return view('livewire.tratar-respostas');
    }
}
