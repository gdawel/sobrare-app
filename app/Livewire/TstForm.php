<?php

namespace App\Livewire;

use App\Models\GruposDeTestes;
use App\Models\OpcoesRespostas;
use App\Models\Perguntas;
use App\Models\Testes;
use Livewire\Component;

use Livewire\Attributes\Computed;

class TstForm extends Component
{
    public $grupoTestesId;
    
    public $testesId;
    
    public $questionId;
    
    public $opcoesRespostasId;

    public $complementos = 'N';
    public $opcRespCheckbox = [];
    public $opcRespIntensidade;


    public $comentarios = 'N';
    public $comentariosCliente;
    
    public function updatedGrupoTestesId() {
        $this->testesId = null;
        $this->questionId = null;
        $this->opcoesRespostasId = null;
        $this->comentarios = "N";
    }

    public function updatedTestesId() {
        $this->questionId = null;
        $this->opcoesRespostasId = null;
        $this->comentarios = "N";
    }

    public function updatedquestionId() {
        $this->opcoesRespostasId = null;
        $this->comentarios = "N";
        $this->complementos = "N";
    }

    public function updatedopcoesRespostasId() {
        $opcaoSel = OpcoesRespostas::where('id', $this->opcoesRespostasId)->first();
       
        $this->comentarios = $opcaoSel->requer_comentarios;
        $this->complementos = $opcaoSel->requer_complemento;
        $this->opcRespCheckbox = [];
        $this->opcRespIntensidade = null;
        $this->comentariosCliente = null;
        
    }

    public function updatedcomentatios() {
        
    }

    public function updatedcomplementos() {
        
    }


    #[Computed()]
    public function grupoTestes() {

        return GruposDeTestes::all();

    }

    #[Computed()]
    public function testes() {

        return Testes::whereHas('gruposTestes', function($query) {
                                $query->where('grupos_de_testes_id', $this->grupoTestesId);
                            })->get();   
    }

    #[Computed()]
    public function perguntas() {
        
        return Perguntas::whereHas('testes', function($query) {
                                $query->where('testes_id', $this->testesId);
                            })->get();
        
    }

    #[Computed()]
    public function opcoesRespostas() {
        // No blade, em vez de passar o ID do Teste, foi passado o
        // ID do grupo de opções de respostas, como questionID. 

        $this->dispatch('perguntaSelecionada', $this->questionId);
        

        /* return Perguntas::where('id','$this->questionId')
                            ->whereHas('opcoesRespostas', function($query) {
                                $query->where('grupo_opcoes_respostas_id', 'codGrupoOpcRespostas');
                            })->get(); */
        
        return OpcoesRespostas::where('grupo_opcoes_respostas_id', $this->questionId)->get();   
    }

    #[Computed()]
    public function comentarios($opcoesRespostasId = null) {

        $opcresp = OpcoesRespostas::where('id', $this->opcoesRespostasId)->get();
        dd($opcresp);
        return OpcoesRespostas::where('id', $this->opcoesRespostasId)->get();   
    }
    
    public function render()
    {
        return view('livewire.tst-form');
    }
}
