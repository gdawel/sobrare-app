<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <!-- Features -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Grid -->
  <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 lg:items-center xl:gap-32 xl:items-center">
    <div>
      <img class="rounded-xl" 
            @if ($grupoSelecionado->imagemGrupo)
                src="{{ asset('storage/' . $grupoSelecionado->imagemGrupo ) }}"
            @else
                src="{{ asset('storage/ywbjBmIX0KdJgKCBS5sqNwRF2lRbXe-metaTWluaS1MT0dPXzIwMjQucG5n-.png') }}"
            @endif    
                alt="{{ $grupoSelecionado->nomeGrupo }}">
    </div>
    <!-- End Col -->

    <div class="mt-5 sm:mt-10 lg:mt-0">
      <div class="space-y-6 sm:space-y-8">
        <!-- Title -->
        <div class="space-y-2 md:space-y-4">
          <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
            
            {{ $grupoSelecionado->nomeGrupo }}
          </h2>
          <p class="text-gray-500 dark:text-neutral-500">
            {!! $grupoSelecionado->descricaoLonga !!}
          </p>
          {{-- Descrever todos os testes do Grupo - Início --}}
          <div>
          <h3><span style="color: rgb(126, 140, 141);">Neste grupo você vai encontrar os seguintes testes:</span></h3>
          <ul class="space-y-2 sm:space-y-4 p-3">
          @foreach ($grupoSelecionado->testes as $teste)
              <li wire:key="{{ $teste->id }}" class="flex space-x-3">
                      <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                      </span>

                      <span class="text-sm sm:text-base text-gray-500 dark:text-neutral-500 px-2"> 
                        <span class="font-bold">{{ $teste->nomeTeste }}</span>
                      </span>
                    </li>
          @endforeach
           </ul>
                    

        </div>
        <span class="block mb-1 text-lg font-semibold uppercase text-blue-600 dark:text-blue-500">
          {{ Number::currency($grupoSelecionado->precoGrupo, 'BRL') }}
        </span>
        <a wire:click.prevent="adicionarAoCarrinho({{ $grupoSelecionado->id }})" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800" 
            href="#">
          <span wire:loading.remove wire:target="adicionarAoCarrinho({{ $grupoSelecionado->id }})">Adicionar ao Carrinho</span> 
          <span class=" text-blue-600 dark:text-blue-500" wire:loading wire:target="adicionarAoCarrinho({{ $grupoSelecionado->id }})">Adicionando...</span>
        </a>
        <!-- End Title -->

       
      </div>
    </div>
    <!-- End Col -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Features -->
</div>
