<div>
    <div class="w-full max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-slate-800">Minha Conta</h1>
        <p class="mt-2 text-slate-600">Atualize suas informações pessoais aqui.</p>

        <form wire:submit="save" class="mt-8 bg-white p-8 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="md:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail (não pode ser alterado)</label>
                    {{-- MUDANÇA: Adicionado px-4 --}}
                    <input type="email" id="email" wire:model="email" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed py-3 px-4">
                </div>
                
                <div class="md:col-span-3 mt-4 border-t pt-6">
                    <h2 class="text-lg font-semibold text-slate-700">Informações que podem ser modificadas:</h2>
                </div>

                <div class="md:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome Completo</label>
                    {{-- MUDANÇA: Adicionado px-4 --}}
                    <input type="text" id="name" wire:model="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4">
                    @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="data_nascimento" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                    {{-- MUDANÇA: Adicionado px-4 --}}
                    <input type="date" id="data_nascimento" wire:model="data_nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4">
                    @error('data_nascimento') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="estado_nascimento" class="block text-sm font-medium text-gray-700">Estado de Nascimento</label>
                    {{-- MUDANÇA: Adicionado px-4 --}}
                    <select id="estado_nascimento" wire:model="estado_nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4">
                        <option value="">Selecione...</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado->uf }}" @if($estado->uf == $estado_nascimento) selected @endif>
                                {{ $estado->estado }}
                            </option>
                        @endforeach
                    </select>
                    @error('estado_nascimento') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="sexo_biologico" class="block text-sm font-medium text-gray-700">Sexo Biológico</label>
                    {{-- MUDANÇA: Adicionado px-4 --}}
                    <select id="sexo_biologico" wire:model="sexo_biologico" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4">
                        <option value="">Selecione...</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                    @error('sexo_biologico') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <button type="button" wire:click="cancel" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Cancelar e Voltar
                </button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Confirmar Alterações
                </button>
            </div>
        </form>
    </div>
</div>