<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('SOBRARE | Neurodiversidade | Recuperar senha')]
class RecuperarSenhaPage extends Component
{
    use LivewireAlert;
    
    public $token;

    #[Url]
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($token) {
        $this->token = $token;
    }
    
    public function recuperarSenha() {

        

        $this->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:255|confirmed'
        ],
        [
            'token.required' => 'Erro no token de recuperação de senha',
            'email.required' => 'Erro: endereço de e-mail ausente durante recuperação de senha',
            'email' => 'O endereço de e-mail é inválido',
            'email.exists' => 'O endereço de e-mail informado não está em nossos registros',
            'password.required' => 'Por favor, informe a senha', 
            'password.min' => 'A senha deve ter no mínimo 8 caracteres', 
            'password.confirmed' => 'As senhas informadas não são iguais', 

        ]);
        $this->alert('info', 'Processando...', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            ]);

        $status = Password::reset([
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token
        ],

        function(User $user, string $password) {
            $password = $this->password;
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
            $user->save();
            event(new PasswordReset($user));
    });
        if($status === Password::PASSWORD_RESET) {
            $this->alert('success', 'Senha redefinida com sucesso', [
            'position' => 'top-end',
            'timer' => 4000,
            'toast' => true,
            ]);
            return redirect('/login');
        } else {
            $this->alert('error', 'Erro ao redefinir a senha. Por favor, solicite nova redenição de senha', [
            'position' => 'center',
            'timer' => 4000,
            'toast' => true,
            ]);
            return redirect('/esqueceu-senha');
        }
    }
    
    public function render()
    {
        return view('livewire.auth.recuperar-senha-page');
    }
}
