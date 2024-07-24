<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('SOBRARE | Neurodiversidade | Registro de Conta')]
class RegistroUsuarioPage extends Component
{
    public $nome;
    public $email;
    public $senha;
    
    public function salvar() {
        $this->validate([
            'nome' => 'required|min:6|max:255',
            'email' => 'required|email|unique:users|max:255',
            'senha' => 'required|min:8|max:255'
        ],
        [
            'nome.required' => 'Por favor, informe o seu nome',
            'nome.min' => 'Por favor, informe o seu nome completo',
            'email.required' => 'Por favor, informe o seu melhor endereço de e-mail',
            'email.unique' => 'O endereço de e-mail informado já consta em nossos registros',
            'email' => 'O endereço de e-mail é inválido',
            'senha.required' => 'Por favor, informe uma senha',
            'senha.min' => 'A senha precisa ter no mínimo 8 caracteres',
        ]);

        $user = User::create([
            'name' => $this->nome,
            'email' => $this->email,
            'password' => Hash::make($this->senha),
            'usertype' => 'Cliente'
        ]);

        auth()->login($user);

        return redirect('/neurodiv');
    }
    
    public function render()
    {
        return view('livewire.auth.registro-usuario-page');
    }
}
