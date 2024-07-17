<?php

namespace App\Livewire\Layouts\Ecomm;

use App\Models\GruposDeTestes;
use Livewire\Component;

class GruposPage extends Component
{
    public $grupos;

    public function mount() {

        $this->grupos = GruposDeTestes::where('isactive', true)->get();
        
    }


    public function render()
    {
        return view('livewire..layouts.ecomm.grupos-page');
    }
}
