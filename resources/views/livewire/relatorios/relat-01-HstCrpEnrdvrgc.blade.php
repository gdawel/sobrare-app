<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'SOBRARE | Neurodiversidade' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="bg-white dark:bg-slate-700">
 
        <main>
<!-- Invoice -->
<div>
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
  <div class="sm:w-11/12 lg:w-3/4 mx-auto">
    <!-- Card -->
    <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl dark:bg-neutral-800">
      <!-- Grid -->
      <div class="flex justify-between">
        <div>
            <img class="h-16" src="{{ asset('storage/sobrare_logo_1.jpg') }}">
          {{-- <svg class="size-10" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 26V13C1 6.37258 6.37258 1 13 1C19.6274 1 25 6.37258 25 13C25 19.6274 19.6274 25 13 25H12" class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2"/>
            <path d="M5 26V13.16C5 8.65336 8.58172 5 13 5C17.4183 5 21 8.65336 21 13.16C21 17.6666 17.4183 21.32 13 21.32H12" class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2"/>
            <circle cx="13" cy="13.0214" r="5" fill="currentColor" class="fill-blue-600 dark:fill-white"/>
          </svg> --}}

          <h1 class="mt-2 pt-16 text-xl md:text-xl font-semibold text-blue-600 dark:text-white">
            {{ $dadosRelatorio['tituloTeste'] }}
            </h1>
        </div>
        <!-- Col -->

        <div class="text-end">
            <img class="h-16" src="{{ asset('storage/logo_neudiv_1.jpg') }}">
          <h2 class="text-base md:text-xl font-semibold text-gray-800 dark:text-neutral-200">NEURODIVERSIDADE</h2>
          <span class="mt-1 block text-gray-500 dark:text-neutral-500">
            Cod. interno: {{ $dadosRelatorio['orders_id'] }}/{{ $dadosRelatorio['idadeCliente'] }}-{{ $dadosRelatorio['estadoNascimentoCliente'] }}</span>

          {{-- <address class="mt-4 not-italic text-gray-800 dark:text-neutral-200">
            45 Roker Terrace<br>
            Latheronwheel<br>
            KW5 8NW, London<br>
            United Kingdom<br>
          </address> --}}
        </div>
        <!-- Col -->
      </div>
      <!-- End Grid -->

      <!-- Grid -->
      <div class="mt-8 grid sm:grid-cols-2 gap-3">
        <div>
          <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Para:</h3>
          <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">{{ $dadosRelatorio['nomeCliente'] }}</h3>
          <address class="mt-2 not-italic text-gray-500 dark:text-neutral-500">
            Idade: {{ $dadosRelatorio['idadeCliente'] }}<br>
          {{--   Breannabury, OR 45801,<br>
            United States<br> --}}
          </address>
        </div>
        <!-- Col -->

        <div class="sm:text-end space-y-2">
          <!-- Grid -->
          <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Emitido em:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">{{ $dadosRelatorio['dataEmissao'] }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Respondido em:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">{{ $dadosRelatorio['dataFinalTeste'] }}</dd>
            </dl>
          </div>
          <!-- End Grid -->
        </div>
        <!-- Col -->
      </div>
      <!-- End Grid -->

      {{-- linha de separação --}}
      <div class="pt-8 hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
        {{-- Subtítulo da Seção --}}
      <div class="text-2xl text-center font-semibold text-gray-400">Perfil Sociodemográfico</div> 
      <div class="text-sm text-center font-semibold text-gray-500">
                    Preenchido em: {{ $dadosRelatorio['dadosCliente']['created_at']->format('d-m-Y') }}</div> 
      {{-- linha de separação --}}
      <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>

      <!-- Icon Blocks -->
<div class="max-w-[85rem] px-2 py-4 sm:px-6 lg:px-4 lg:py-6 ">
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-6">
    <!-- Card -->
    <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800 dark:text-white">Sexo Biológico</h3>
          <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['sexoBiologico'] }}</p>
        </div>
        
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
    
      <div>
        <div>
          <h3 class="block font-bold text-gray-800 dark:text-white">Gênero</h3>
          <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['genero'] }}</p>
        </div>
        
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800 dark:text-white">Etnia</h3>
          <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['etnia'] }}</p>
        </div>
       
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800 dark:text-white">Mão mais ágil</h3>
          <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['maoMaisAgil'] }}</p>
        </div>
        
      </div>
    </a>
    <!-- End Card -->
  </div>

  <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-6">
    <!-- Card -->
    <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800 dark:text-white">Estado de Nascimento</h3>
          <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['estadoNascimentoCliente'] }}</p>
        </div>
        
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
    
      <div>
        <div>
          <h3 class="block font-bold text-gray-800 dark:text-white">Cidade que Reside</h3>
          <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['cidadeQueReside'] }}</p>
        </div>
        
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800 dark:text-white">Outros Idiomas</h3>
          <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['outrosIdiomas'] }}</p>
        </div>
       
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800 dark:text-white">Grau escolar</h3>
          <p class="text-gray-600 dark:text-neutral-400">adicionar no BD</p>
        </div>
        
      </div>
    </a>
    <!-- End Card -->
  </div>
</div>
<!-- End Icon Blocks -->

      <!-- Table -->
      <div class="mt-6">
        <div class="border border-gray-200 p-6 rounded-lg space-y-6 dark:border-neutral-700">
          <div class="grid grid-cols-12 ">
            <div class="text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">N. Seq.</div>
            <div class="col-span-5 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</div>
            <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Resposta</div>
            <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Comentários do Cliente</div>
          </div>

          <div class=" border-b border-gray-200 dark:border-neutral-700"></div>

          <div class="grid grid-cols-12">
          @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                
          
            <div class="pb-2" wire:key="{{ $item->pergunta->id }}">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</h5> --}}
              <p class=" text-sm text-gray-800 dark:text-neutral-200">
                {{ $item->pergunta->id }}. </p>
            </div>
            <div class="col-span-5">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</h5> --}}
              <p class=" text-sm text-gray-800 dark:text-neutral-200">
                {{ $item->pergunta->enunciado }}</p>
            </div>
            <div class="col-span-3">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Resposta</h5> --}}
              <p class="text-sm text-gray-800 dark:text-neutral-200">{{ $item->opcaoresposta->textoResposta }}</p>
            </div>
            {{-- <div>
              <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Rate</h5>
              <p class="text-gray-800 dark:text-neutral-200">5</p>
            </div> --}}
            <div class="col-span-3">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Comentários do Cliente</h5> --}}
              <p class="text-sm text-gray-800 dark:text-neutral-200">{{ $item->comentariosCliente }}</p>
            </div>
          
          @endforeach
          </div>
        </div>
      </div>
      <!-- End Table -->

      <!-- Flex -->
      {{-- <div class="mt-8 flex sm:justify-end">
        <div class="w-full max-w-2xl sm:text-end space-y-2">
          <!-- Grid -->
          <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Subtotal:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$2750.00</dd>
            </dl>

            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Total:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$2750.00</dd>
            </dl>

            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Tax:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$39.00</dd>
            </dl>

            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Amount paid:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$2789.00</dd>
            </dl>

            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Due balance:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$0.00</dd>
            </dl>
          </div>
          <!-- End Grid -->
        </div>
      </div> --}}
      <!-- End Flex -->

      <div class="mt-8 sm:mt-12">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Obrigado!</h4>
        <p class="text-gray-500 dark:text-neutral-500">Se tiver qualquer dúvida referente a este teste, aqui estão as informações de contato:</p>
        <div class="mt-2">
          <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">faleconosco@sobrare.com.br</p>
          <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">+55 (11) 5549-2943</p>
        </div>
      </div>

      <p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2024 SOBRARE - Todos os direitos reservados.</p>
    </div>
    <!-- End Card -->

    
  </div>
</div>
<!-- End Invoice -->

 </main>
        
        @livewireScripts
    </body>
</html>