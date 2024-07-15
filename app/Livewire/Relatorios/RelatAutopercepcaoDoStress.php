<?php

namespace App\Livewire\Relatorios;

use Livewire\Component;
use App\Models\Orderitems;
use App\Models\Perguntas;
use App\Models\Testes;
use App\Models\Useranswers;
use Livewire\Attributes\On;

class RelatAutopercepcaoDoStress extends Component
{
    
    public $resultadoTeste;
    public $orders_id;
    public $testes_id;
    public $tituloTeste;
    public $parametrosParaRelatorios =[];
    public $useranswers =[];
    public $perguntas = [];
    public $colecaoRespostas = [];
    
    #[On('resultadoTeste')]
    public function montarRelatorio($orders_id, $testes_id, $parametrosParaRelatorios) {
        
        

        $this->resultadoTeste = Orderitems::with('useranswers')
                                        ->where('orders_id',$orders_id)
                                        ->where('testes_id',$testes_id)
                                        ->get();
        // Em 03/07/2024 - Testar de pegar todos os dados pelo Useranswers.
        //$testandoDadosPeloUseranswers = Useranswers::with('perguntas', 'opcoesderespostas')->get();
        //  INCOMPLETO  03/07/2024 ///

        $this->orders_id = $this->resultadoTeste[0]->orders_id;
        $this->testes_id = $this->resultadoTeste[0]->testes_id;
        $this->useranswers = $this->resultadoTeste[0]->useranswers;
        $dadosDoTeste = Testes::where('id',$this->testes_id)->first();
        $this->tituloTeste = $dadosDoTeste->nomeTeste;
        
        //dd($testes_id);
        //dd($parametrosParaRelatorios);
       /*  $this->colecaoRespostas = Useranswers::with('pergunta', 'opcaoresposta')
                                    ->where('orderitems_id', $parametrosParaRelatorios['orderItem_id'])
                                    ->get();
        dd($this->colecaoRespostas); */
        //dd($this->useranswers);
        //dd($this->resultadoTeste);
    }

    public function render()
    {
        return view('livewire.relatorios.relat-autopercepcao-do-stress');
    }
}
