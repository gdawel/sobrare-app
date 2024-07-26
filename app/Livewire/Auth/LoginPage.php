<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('SOBRARE | Neurodiversidade | Validar Credenciais de Acesso')]
class LoginPage extends Component
{
    use LivewireAlert;
    
    public $email;
    public $password;

    public function fazerLogin() {
        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:6|max:255'
        ],
            [
            'email.required' => 'Por favor, informe o endereço de e-mail',
            'email' => 'O endereço de e-mail é inválido',
            'password.min' => 'A senha é inválida',
        ]);

        if(!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->alert('error', 'As credenciais informadas não conferem com nossos registros.', [
                'position' => 'center',
                'timer' => 4000,
                'toast' => true,
                'timerProgressBar' => true,
                ]);
            return;
        }

        $this->alert('success', 'Acesso validado com sucesso!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
]);

        return redirect()->intended();
    }
    
    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
