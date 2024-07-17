<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GruposDeTestes;
use Livewire\Attributes\Title;

class HomeNeuroDiv extends Component
{
    
    public $grupos;

    #[Title('SOBRARE | Neurodiversidade | Testes')]
    public function mount() {

        $this->grupos = GruposDeTestes::where('isActive', true)->get();
        //dd($this->grupos);
    }
    
    public function render()
    {
        return view('livewire.home-neuro-div');
    }
}
