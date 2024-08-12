<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'SOBRARE | Neurodiversidade' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="bg-white">
 
        <main>
<!-- Invoice -->
<div>
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
  <div class="sm:w-11/12 lg:w-3/4 mx-auto">
    <!-- Card -->
    <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl">
      <!-- Grid -->
      <div class="flex justify-between">
        <div>
           
          

          <h1 class="mt-2 pt-16 text-xl md:text-xl font-semibold text-blue-600">
            {{ $dadosRelatorio['tituloTeste'] }}
            </h1>
        </div>
        <!-- Col -->

        <div class="text-end">
            
          <h2 class="text-base md:text-xl font-semibold text-gray-800">NEURODIVERSIDADE</h2>
          <span class="mt-1 block text-gray-500">
            Cod. interno: {{ $dadosRelatorio['orders_id'] }}/{{ $dadosRelatorio['idadeCliente'] }}-{{ $dadosRelatorio['estadoNascimentoCliente'] }}</span>

          
        </div>
        <!-- Col -->
      </div>
      <!-- End Grid -->

      <!-- Grid -->
      <div class="mt-8 grid sm:grid-cols-2 gap-3">
        <div>
          <h3 class="text-lg font-semibold text-gray-800">Para:</h3>
          <h3 class="text-lg font-semibold text-gray-800">{{ $dadosRelatorio['nomeCliente'] }}</h3>
          <address class="mt-2 not-italic text-gray-500">
            Idade: {{ $dadosRelatorio['idadeCliente'] }}<br>
          
          </address>
        </div>
        <!-- Col -->

        <div class="sm:text-end space-y-2">
          <!-- Grid -->
          <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800">Emitido em:</dt>
              <dd class="col-span-2 text-gray-500">{{ $dadosRelatorio['dataEmissao'] }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800">Respondido em:</dt>
              <dd class="col-span-2 text-gray-500">{{ $dadosRelatorio['dataFinalTeste'] }}</dd>
            </dl>
          </div>
          <!-- End Grid -->
        </div>
        <!-- Col -->
      </div>
      <!-- End Grid -->

      {{-- linha de separação --}}
      <div class="pt-8 hidden sm:block border-b border-gray-200"></div>
        {{-- Subtítulo da Seção --}}
      <div class="text-2xl text-center font-semibold text-gray-400">Perfil Sociodemográfico</div> 
      <div class="text-sm text-center font-semibold text-gray-500">
                    Preenchido em: {{ $dadosRelatorio['dadosCliente']['created_at']->format('d-m-Y') }}</div> 
      {{-- linha de separação --}}
      <div class="hidden sm:block border-b border-gray-200"></div>

      <!-- Icon Blocks -->
<div class="max-w-[85rem] px-2 py-4 sm:px-6 lg:px-4 lg:py-6 ">
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-6">
    <!-- Card -->
    
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800">Sexo Biológico</h3>
          <p class="text-gray-600">{{ $dadosRelatorio['sexoBiologico'] }}</p>
        </div>
        
      </div>
    
    <!-- End Card -->

    <!-- Card -->
    
    
      <div>
        <div>
          <h3 class="block font-bold text-gray-800">Gênero</h3>
          <p class="text-gray-600">{{ $dadosRelatorio['dadosCliente']['genero'] }}</p>
        </div>
        
      </div>
   
    <!-- End Card -->

    <!-- Card -->
    
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800">Etnia</h3>
          <p class="text-gray-600">{{ $dadosRelatorio['dadosCliente']['etnia'] }}</p>
        </div>
       
      </div>
    
    <!-- End Card -->

    <!-- Card -->
    
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800">Mão mais ágil</h3>
          <p class="text-gray-600">{{ $dadosRelatorio['dadosCliente']['maoMaisAgil'] }}</p>
        </div>
        
      </div>
    
    <!-- End Card -->
  </div>

  <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-6">
    <!-- Card -->
    
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800">Estado de Nascimento</h3>
          <p class="text-gray-600">{{ $dadosRelatorio['estadoNascimentoCliente'] }}</p>
        </div>
        
      </div>
    
    <!-- End Card -->

    <!-- Card -->
    
    
      <div>
        <div>
          <h3 class="block font-bold text-gray-800">Cidade que Reside</h3>
          <p class="text-gray-600">{{ $dadosRelatorio['dadosCliente']['cidadeQueReside'] }}</p>
        </div>
        
      </div>
    
    <!-- End Card -->

    <!-- Card -->
    
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800">Outros Idiomas</h3>
          <p class="text-gray-600">{{ $dadosRelatorio['dadosCliente']['outrosIdiomas'] }}</p>
        </div>
       
      </div>
    
    <!-- End Card -->

    <!-- Card -->
    
      
      <div>
        <div>
          <h3 class="block font-bold text-gray-800">Grau escolar</h3>
          <p class="text-gray-600">adicionar no BD</p>
        </div>
        
      </div>
    
    <!-- End Card -->
  </div>
</div>
<!-- End Icon Blocks -->

      <!-- Table -->
      <div class="mt-6">
        <div class="border border-gray-200 p-6 rounded-lg space-y-6">
          <div class="grid grid-cols-12 ">
            <div class="text-xs font-medium text-gray-500 uppercase">N. Seq.</div>
            <div class="col-span-5 text-start text-xs font-medium text-gray-500 uppercase">Pergunta do teste</div>
            <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase">Resposta</div>
            <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase">Comentários do Cliente</div>
          </div>

          <div class=" border-b border-gray-200"></div>

         
        </div>
      </div>
      <!-- End Table -->

      

      <div class="mt-8 sm:mt-12">
        <h4 class="text-lg font-semibold text-gray-800">Obrigado!</h4>
        <p class="text-gray-500">Se tiver qualquer dúvida referente a este teste, aqui estão as informações de contato:</p>
        <div class="mt-2">
          <p class="block text-sm font-medium text-gray-800">faleconosco@sobrare.com.br</p>
          <p class="block text-sm font-medium text-gray-800">+55 (11) 5549-2943</p>
        </div>
      </div>

      <p class="mt-5 text-sm text-gray-500">2024 SOBRARE - Todos os direitos reservados.</p>
    </div>
    <!-- End Card -->

    
  </div>
</div>
<!-- End Invoice -->

 </main>
        
        @livewireScripts
    </body>
</html>