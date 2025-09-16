<div>
    {{-- The Master doesn't talk, he acts. --}}

    <!-- Hero -->
<div class="relative overflow-hidden before:absolute before:top-0 before:start-1/2 before:bg-[url('https://preline.co/assets/svg/examples/squared-bg-element.svg')] dark:before:bg-[url('https://preline.co/assets/svg/examples-dark/squared-bg-element.svg')] before:bg-no-repeat before:bg-top before:size-full before:-z-[1] before:transform before:-translate-x-1/2">
  <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-10">
    <!-- Announcement Banner -->
    <div class="flex justify-center">
      <a class="inline-flex items-center gap-x-2 bg-white border border-gray-200 text-xs text-gray-600 p-2 px-3 rounded-full transition hover:border-gray-300 dark:bg-neutral-800 dark:border-neutral-700 dark:hover:border-neutral-600 dark:text-neutral-400" href="/neurodiversidade">
        Para entender do que se trata a Neurodiversidade...
        <span class="flex items-center gap-x-1">
          <span class="border-s border-gray-200 text-blue-600 ps-2 dark:text-blue-500 dark:border-neutral-700">Quero Entender</span>
          <svg class="flex-shrink-0 size-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </span>
      </a>
    </div>
    <!-- End Announcement Banner -->

    <!-- Title -->
    <div class="mt-5 max-w-xl text-center mx-auto">
      <h1 class="block font-bold text-gray-800 text-4xl md:text-5xl lg:text-5xl dark:text-neutral-200">
        Neurodiversidade <br>+ <br>Resiliência <br>=<br> Produtividade
      </h1>
    </div>
    <!-- End Title -->

    <div class="mt-5 max-w-3xl text-center mx-auto">
      <p class="text-lg text-gray-600 dark:text-neutral-400">Diagnósticos dinâmicos para a intervenção em Adultos</p>
    </div>

    <!-- Buttons -->
    <div class="mt-8 gap-3 flex justify-center">
      <a class="inline-flex justify-center items-center gap-x-3 text-center bg-gradient-to-tl from-blue-600 to-violet-600 hover:from-violet-600 hover:to-blue-600 border border-transparent text-white text-sm font-medium rounded-full py-3 px-4 dark:focus:ring-offset-gray-800" href="https://sobrare.com.br">
        {{-- <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
        </svg> --}}
        Retornar ao Site SOBRARE
      </a>
    </div>
    <!-- End Buttons -->
  </div>
</div>
<!-- End Hero -->



<!-- Pricing -->
<div class=" bg-white max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Title -->
  <div class="max-w-2xl mx-auto text-center mb-6 lg:mb-10">
    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Grupos de Testes</h2>
    <p class="mt-1 text-gray-600 dark:text-neutral-400">Cada grupo de testes abrange uma área exploratória de Neurodiversidade.</p>
  </div>
  <!-- End Title -->

  
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
        <img src="{{ asset('storage/ywbjBmIX0KdJgKCBS5sqNwRF2lRbXe-metaTWluaS1MT0dPXzIwMjQucG5n-.png') }}"
             alt="{{ $grupo->nomeGrupo }}">
        
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

<!-- Approach -->
<div class="bg-neutral-900">
  <!-- Approach -->
  <div class="max-w-5xl px-4 xl:px-0 py-10 lg:pt-20 lg:pb-20 mx-auto">
    <!-- Title -->
    <div class="max-w-3xl mb-10 lg:mb-14">
      <h2 class="text-white font-semibold text-2xl md:text-4xl md:leading-tight">Como Funcionam os Testes?</h2>
      <p class="mt-1 text-neutral-400">Os testes não são comercializados individualmente. São agrupados por área a ser explorada. Ao adquirir um grupo de testes você terá acesso para responder todos os testes do grupo e seus respectivos relatórios.</p>
    </div>
    <!-- End Title -->

    <!-- Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 lg:items-center">
      <div class="aspect-w-16 aspect-h-9 lg:aspect-none">
        <img class="w-full object-cover rounded-xl" src="https://images.unsplash.com/photo-1587614203976-365c74645e83?q=80&w=480&h=600&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image Description">
      </div>
      <!-- End Col -->

      <!-- Timeline -->
      <div>
        <!-- Heading -->
        <div class="mb-4">
          <h3 class="text-[#ff0] text-xs font-medium uppercase">
            Passo-a-Passo de Como Funciona
          </h3>
        </div>
        <!-- End Heading -->

        <!-- Item -->
        <div class="flex gap-x-5 ms-1">
          <!-- Icon -->
          <div class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-neutral-800">
            <div class="relative z-10 size-8 flex justify-center items-center">
              <span class="flex flex-shrink-0 justify-center items-center size-8 border border-neutral-800 text-[#ff0] font-semibold text-xs uppercase rounded-full">
                1
              </span>
            </div>
          </div>
          <!-- End Icon -->

          <!-- Right Content -->
          <div class="grow pt-0.5 pb-8 sm:pb-12">
            <p class="text-sm lg:text-base text-neutral-400">
              <span class="text-white">Explore os Detalhes de Cada Grupo:</span>
              Clicando em 'Saiba Mais', você poderá ler quais testes compõem cada grupo e quais as áreas que cada teste vai explorar. 
            </p>
          </div>
          <!-- End Right Content -->
        </div>
        <!-- End Item -->

        <!-- Item -->
        <div class="flex gap-x-5 ms-1">
          <!-- Icon -->
          <div class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-neutral-800">
            <div class="relative z-10 size-8 flex justify-center items-center">
              <span class="flex flex-shrink-0 justify-center items-center size-8 border border-neutral-800 text-[#ff0] font-semibold text-xs uppercase rounded-full">
                2
              </span>
            </div>
          </div>
          <!-- End Icon -->

          <!-- Right Content -->
          <div class="grow pt-0.5 pb-8 sm:pb-12">
            <p class="text-sm lg:text-base text-neutral-400">
              <span class="text-white">Efetue a Compra:</span>
              Depois de escolher qual(is) grupo(s) de testes, adicione ao carrinho de compras. Finalize a sua compra efetuando o pagamento e criando a sua conta para acesso aos testes e relatórios.
            </p>
          </div>
          <!-- End Right Content -->
        </div>
        <!-- End Item -->

        <!-- Item -->
        <div class="flex gap-x-5 ms-1">
          <!-- Icon -->
          <div class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-neutral-800">
            <div class="relative z-10 size-8 flex justify-center items-center">
              <span class="flex flex-shrink-0 justify-center items-center size-8 border border-neutral-800 text-[#ff0] font-semibold text-xs uppercase rounded-full">
                3
              </span>
            </div>
          </div>
          <!-- End Icon -->

          <!-- Right Content -->
          <div class="grow pt-0.5 pb-8 sm:pb-12">
            <p class="text-sm md:text-base text-neutral-400">
              <span class="text-white">Responder os Testes:</span>
              Existe uma ordem para responder os testes. Um teste só é desbloqueado após responder o anterior. Cada teste possui as instruções de como responder.
            </p>
          </div>
          <!-- End Right Content -->
        </div>
        <!-- End Item -->

        <!-- Item -->
        <div class="flex gap-x-5 ms-1">
          <!-- Icon -->
          <div class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-neutral-800">
            <div class="relative z-10 size-8 flex justify-center items-center">
              <span class="flex flex-shrink-0 justify-center items-center size-8 border border-neutral-800 text-[#ff0] font-semibold text-xs uppercase rounded-full">
                4
              </span>
            </div>
          </div>
          <!-- End Icon -->

          <!-- Right Content -->
          <div class="grow pt-0.5 pb-8 sm:pb-12">
            <p class="text-sm md:text-base text-neutral-400">
              <span class="text-white">Acesso aos Relatórios:</span>
              Ao finalizar um teste, o sistema libera a emissão do respectivo relatório em formato PDF.
            </p>
          </div>
          <!-- End Right Content -->
        </div>
        <!-- End Item -->

        <a class="group inline-flex items-center gap-x-2 py-2 px-3 bg-[#ff0] font-medium text-sm text-neutral-800 rounded-full focus:outline-none" href="#">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path><path class="opacity-0 group-hover:opacity-100 group-focus:opacity-100 group-hover:delay-100 transition" d="M14.05 2a9 9 0 0 1 8 7.94"></path><path class="opacity-0 group-hover:opacity-100 group-focus:opacity-100 transition" d="M14.05 6A5 5 0 0 1 18 10"></path></svg>
          Se precisar de ajuda, clique aqui.
        </a>
      </div>
      <!-- End Timeline -->
    </div>
    <!-- End Grid -->
  </div>
</div>
<!-- End Approach -->
</div>
