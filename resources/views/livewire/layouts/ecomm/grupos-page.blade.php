<!-- Pricing -->
<div class=" bg-white max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Title -->
  <div class="max-w-2xl mx-auto text-center mb-6 lg:mb-10">
    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Grupos de Testes</h2>
    <p class="mt-1 text-gray-600 dark:text-neutral-400">Cada grupo de testes abrange uma área exploratória de Neurodiversidade.</p>
  </div>
  <!-- End Title -->

  {{-- @dd($grupos); --}}
    <!-- Card Blog -->
  <div class="max-w-[85rem] px-4 py-6 sm:px-6 lg:px-8 lg:py-8 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Card -->
      @foreach ($grupos as $grupo)
          @switch($grupo->codGrupo)
              @case('IG')
                  @php $bgcolor = 'from-blue-500'; @endphp
              @break
              @case('DH')
                  @php $bgcolor = 'from-rose-500';@endphp
                  @break
              @case('EA')
                  @php $bgcolor = 'from-amber-500';@endphp
                  @break
              
              @case('DA')
                  @php $bgcolor = 'from-green-500';@endphp
                  @break
              
              @case('CR')
                  @php $bgcolor = 'from-gray-500';@endphp
                  @break
              
              @case('IA')
                  @php $bgcolor = 'from-purple-500';@endphp
                  @break
              
              @case('PM')
                  @php $bgcolor = 'from-emerald-500';@endphp
                  @break
              
              @case('QR')
                  @php $bgcolor = 'from-orange-500';@endphp
                  @break
                          
              @default
                  @php $bgcolor = 'from-indigo-500'; @endphp
          @endswitch
      
        <div wire:key="{{ $grupo->id }}" class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl
                  dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                  
        <div class="h-52 flex flex-col justify-center items-center bg-gradient-to-bl {{ $bgcolor }} rounded-t-xl">
          @if (!empty($grupo['imagemGrupo']))

            <img class="h-full w-full object-contain rounded-t-xl" src="{{ asset('storage/' . $grupo['imagemGrupo'] ) }}" alt="{{ $grupo->nomeGrupo }}">
          @else
            <img class="h-full w-full object-contain" src="{{ asset('images/Logo-B_Redondo-200x200.png') }}" alt="{{ $grupo->nomeGrupo }}">
          @endif


        </div>
        <div class="p-4 md:p-6">
          <span class="block mb-1 text-lg font-semibold uppercase text-blue-600 dark:text-blue-500">
            {{ Number::currency($grupo->precoGrupo, 'BRL') }}
          </span>
          <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-300 dark:hover:text-white">
            {{ $grupo->nomeGrupo }}
          </h3>
          <p class="mt-3 text-gray-500 dark:text-neutral-500">
            {!! $grupo->descricaoCurta !!}
          </p>
        </div>
        <div class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
          <a wire:navigate class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-es-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800" 
              href="/produtos/{{ $grupo->slug }}">
            Saiba mais
          </a>
          <a wire:click.prevent="adicionarAoCarrinho({{ $grupo->id }})" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800" href="#">
            <span wire:loading.remove wire:target="adicionarAoCarrinho({{ $grupo->id }})">Adicionar ao Carrinho</span> 
            <span class=" text-blue-600 dark:text-blue-500" wire:loading wire:target="adicionarAoCarrinho({{ $grupo->id }})">Adicionando...</span>
          </a>
        </div>
      </div>
      <!-- End Card -->
      @endforeach
    
    </div>
    <!-- End Grid -->
  </div>
  <!-- End Card Blog -->

  
</div>
<!-- End Pricing -->
