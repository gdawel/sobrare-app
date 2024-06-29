<div>
    <h2 class="text-dark text-center text-base font-medium py-1">Dados do Cliente para Verificação</h2>
      <div class="pb-2">
         <select wire:model.live="clienteSelecionado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rouded-lg">
         <option>Selecione o Cliente</option>
            @foreach ($this->clientesTodos as $clientes)
                  <option  value="{{ $clientes->id }}"> {{ $clientes->name }} </option>
            @endforeach
         </select>
      </div>
    @if($mostraMontaPergunta)

        @livewire('monta-pergunta', ['clienteSelecionado' => $clienteSelecionado])
      
    @endif

</div>
