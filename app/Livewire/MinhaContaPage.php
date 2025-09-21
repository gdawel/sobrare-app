<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Estados; // Supondo que seu modelo se chama 'Estados'
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MinhaContaPage extends Component
{
    use LivewireAlert;

    public $email;

    // Propriedades para os campos do formulário
    #[Rule('required|string|max:250')]
    public $name;

    #[Rule('required|date')]
    public $data_nascimento;

    #[Rule('required|in:M,F')]
    public $sexo_biologico;

    #[Rule('required|exists:estados,uf')] // Garante que o estado selecionado existe na tabela 'estados'
    public $estado_nascimento;

    // O método mount é executado quando o componente carrega
    public function mount()
    {
        // Pega o usuário logado
        $user = Auth::user();

        // Preenche as propriedades com os dados atuais do usuário
        $this->name = $user->name;
        $this->email = $user->email;
        $this->data_nascimento = $user->data_nascimento;
        $this->sexo_biologico = $user->sexo_biologico;
        $this->estado_nascimento = $user->estado_nascimento;
    }

    // Método chamado quando o formulário é enviado
    public function save()
    {
        // Valida os dados com base nas regras definidas acima
        $this->validate();

        // Pega o usuário novamente para garantir
        $user = Auth::user();

        // Atualiza o modelo do usuário com os novos dados
        $user->update([
            'name' => $this->name,
            'data_nascimento' => $this->data_nascimento,
            'sexo_biologico' => $this->sexo_biologico,
            'estado_nascimento' => $this->estado_nascimento,
        ]);

        // Envia um alerta de sucesso
        $this->alert('success', 'Dados atualizados com sucesso!');
    }

    // Método para o botão "Cancelar"
    public function cancel()
    {
        return $this->redirect('/meus-pedidos', navigate: true);
    }

    // O método render prepara os dados e renderiza a view
    public function render()
    {
        // Busca todos os estados no banco para popular o dropdown
        $estados = Estados::orderBy('estado')->get();

        return view('livewire.minha-conta-page', [
            'estados' => $estados
        ]);
    }
}