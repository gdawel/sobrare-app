<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;


#[Title('SOBRARE | Neurodiversidade | Esqueceu a senha')]
class EsqueceuSenhaPage extends Component
{
    use LivewireAlert;
    
    public $email;

    public function esqueceuSenha() {

        $this->validate([
            'email' => 'required|email|exists:users,email|max:255'
        ],[
            'email.required' => 'Por favor, informe o endereço de e-mail',
            'email' => 'O endereço de e-mail é inválido',
            'email.exists' => 'O endereço de e-mail informado não está em nossos registros'
        ]
    );
        $this->alert('info', 'Processando...', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            ]);
        $status = Password::sendResetLink(['email' => $this->email]);

        if($status === Password::RESET_LINK_SENT) {
            $this->alert('warning', 'Uma mensagem com instruções de como redefinir sua senha foi enviado ao seu e-mail.', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
            ]);
            $this->email = '';
        }
    }

    public function render()
    {
        return view('livewire.auth.esqueceu-senha-page');
    }
}
