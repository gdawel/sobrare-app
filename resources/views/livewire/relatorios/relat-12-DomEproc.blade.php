{{-- @dd($dadosRelatorio); --}}

<!-- Invoice -->
<div class="max-w-4xl mx-auto my-8 bg-white shadow-lg rounded-lg dark:bg-neutral-800">
  <!-- First Line -->
  <div class="flex justify-between items-center py-4 px-6">
      <img src="{{ asset('storage/sobrare_logo_1.jpg') }}" alt="Sobrare Logo" class="h-12">
      <h1 class="text-xl font-bold text-center text-blue-600 dark:text-white uppercase">NEURODIVERSIDADE</h1>
      <img src="{{ asset('storage/logo_neudiv_1.jpg') }}" alt="Neurodiv Logo" class="h-12">
  </div>
  <!-- Horizontal Line -->
  <hr class="border-gray-300 dark:border-gray-600">
  <!-- Second Line -->
  <div class="py-4 px-6">
      <h2 class="text-2xl font-bold text-center text-blue-600 dark:text-blue-400">{{ $dadosRelatorio['tituloTeste'] }}</h2>
  </div>
  <!-- Horizontal Line -->
  <hr class="border-gray-300 dark:border-gray-600">
  <!-- Third Line -->
  <div class="py-4 px-6 flex justify-between text-sm font-medium text-gray-800 dark:text-gray-400">
      <div>
          <p><span class="font-semibold">Nome:</span> {{ $dadosRelatorio['nomeCliente'] }}</p>
          <p><span class="font-semibold">Idade:</span> {{ $dadosRelatorio['idadeCliente'] }}</p>
      </div>
      <div class="text-right">
          <p><span class="font-semibold">Respondido em:</span> {{ $dadosRelatorio['dataFinalTeste'] }}</p>
          <p><span class="font-semibold">Emitido em:</span> {{ $dadosRelatorio['dataEmissao'] }}</p>
      </div>
  </div>
  <div class=" border-b border-gray-200 dark:border-neutral-700"></div>
      <div class="">
        <h2 class="text-xl font-semibold text-center text-blue-600 mb-2">{!! $dadosRelatorio['textoIntro'] !!}</h2>
        {{-- <div class="text-xs p-1 font-semibold text-gray-800 uppercase dark:text-neutral-500">Minhas percepções nos últimos 90 dias e a avaliação recebida</div> --}}
        {{-- <div class="col-span-5 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Pergunta do teste</div>
        <div class="col-span-3 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Resposta</div>
        <div class="col-span-3 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Comentários do Cliente</div> --}}
      </div>

  <div class=" border-b border-gray-200 dark:border-neutral-700"></div>
            
          
          {{-- ///  Domínios e Processos no Comportamento Adaptativo associados com a Neurodivergência	 --}}
          

                <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
                    
      
                    <table class="w-full table-auto border-collapse">
                        {{-- <thead>
                            <tr class="bg-blue-100 dark:bg-dark-3 text-gray-700 dark:text-gray-300 text-sm font-bold">
                                <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Seq.</th>
                                <th class="border border-gray-300 py-1 px-2 text-left w-4/12">Áreas mapeadas na cognição</th>
                                
                                <th class="border border-gray-300 py-1 px-2 text-left w-auto">Este mapeamento é um indicativo para a hipótese diagnóstica. E1plicita as ocorrências presentes em áreas cognitivas e que são subsídios ao processo psicoterapêutico:
                                </th>
                            </tr>
                        </thead> --}}
                        <tbody>
                                                   
                            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                                    
                        
                                   @if ($item->textoResposta->textoResposta != '0') 
                                    <tr>
                                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                                            {{ $textoCompleto = $item->textoResposta->textoResposta; }} 
                                            {{ $textoCompleto = $item->comentariosCliente; }} 
                                        </td>
                                        {{-- <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                                            {{ $areasMapeadas }}
                                        </td>
                                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                                            {{ $anomalidadePercebida }}
                                        </td> --}}
                                    </tr>
                                  @endif
                            @endforeach
                    
                        </tbody>
            </table>

            

            <div class="mt-2">
              <p class="block text-xs text-black dark:text-neutral-200">{!! $dadosRelatorio['textoFecha'] !!}</p>
              
            </div>
            <div class="mt-2">
              <p class="block text-xs text-black dark:text-neutral-200">{!! $dadosRelatorio['textoRodape'] !!}</p>
              
            </div>
          
    
          {{-- <p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2024 SOBRARE - Todos os direitos reservados.</p> --}}
        </div>
    
          {{-- <div class="mt-8 sm:mt-12">
            <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Obrigado!</h4>
            <p class="text-gray-500 dark:text-neutral-500">Se tiver qualquer dúvida referente a este teste, aqui estão as informações de contato:</p>
            <div class="mt-2">
              <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">faleconosco@sobrare.com.br</p>
              <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">+55 (11) 5549-2943</p>
            </div>
          </div>
    
          <p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2024 SOBRARE - Todos os direitos reservados.</p> --}}
        </div>
        <!-- End Card -->
    
        
      </div>
    </div>
    <!-- End Invoice -->
    
     