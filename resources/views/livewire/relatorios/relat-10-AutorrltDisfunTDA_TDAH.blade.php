

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



    
    
          {{-- @dd($dadosRelatorio); --}}
          
          
          <!-- Table - Respostas ao Questionário Histórico -->
          <div class="mt-6">
            <div class="border border-gray-200 p-3 rounded-lg space-y-6 dark:border-neutral-700">
        
            {{-- linha de separação --}}
          <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
              <div class="">
                <h2 class="text-xl font-semibold text-blue-600 mb-2">Subsídios e contribuições para o processo de tratamento terapêutico</h2>
                {{-- <div class="text-xs p-1 font-semibold text-gray-800 uppercase dark:text-neutral-500">Minhas percepções nos últimos 90 dias e a avaliação recebida</div> --}}
                {{-- <div class="col-span-5 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Pergunta do teste</div>
                <div class="col-span-3 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Resposta</div>
                <div class="col-span-3 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Comentários do Cliente</div> --}}
              </div>
    
              <div class=" border-b border-gray-200 dark:border-neutral-700"></div>

              <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-blue-100 dark:bg-dark-3 text-gray-700 dark:text-gray-300 text-xs font-bold">
                        
                        <th class="border border-gray-300 py-1 px-2 text-left w-auto">Detalhes a serem observados no processo psicoterapêutico:</th>
                        <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Sim, isso<br>aconteceu</th>
                        <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Na<br>infância</th>
                        <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Na vida<br>adulta</th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                            <tr>
                                <td>
                                @php
                                // Determine the subheading of a group of answers
                                $subHeading = match ($item->sequencia) {
                                    1 => 'TDA/TDAH e autorrelatos no desempenho escolar: ',
                                    12 => 'TDA/TDAH e autorrelatos na relações familiares e interpessoais: ',
                                    23 => 'TDA/TDAH e autorrelatos no desempenho profissional: ',
                                    32 => 'TDA/TDAH e autorrelatos na autoimagem e estima: ',
                                    
                                    default => '',
                                };
                                @endphp
                
                                <p class="text-sm font-medium text-red-500 uppercase dark:text-neutral-500">{{ $subHeading }} </p>
                                <td>
                            </tr>
                            <tr>
                                
                                    @php
                                        $posicao = strpos($item->textoResposta->textoResposta, ': ');
                                        $resultado = ($posicao !== false) ? substr($item->textoResposta->textoResposta, $posicao + 2) : $item->textoResposta->textoResposta;
                                    @endphp
                                    @if(isset($resultado))
                                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                                        {{ $resultado }}
                                        </td>
                                    @endif
                                
                                
                                    @if ($item->opcaoResposta->numSeqResp == 2)
                                        <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">
                                        x
                                    </td>
                                    
                                    @endif
                                
                                @foreach ($item->areasImpactadas as $areaImpactada)
                                        @if(stripos($areaImpactada, 'infância') !== false)
                                            <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">
                                            x
                                            </td>
                                        @elseif(stripos($areaImpactada, 'vida adulta'))
                                            <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">
                                            x
                                            </td>
                                        @else
                                            <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">
                                            <p> </p>
                                            </td>
                                        @endif      
                                @endforeach
                                @if(!empty($item->areasImpactadas) && ((stripos($areaImpactada, 'vida adulta') == null)))
                                <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">
                                    <p> </p>
                                    </td>
                                @endif
                               
                            </tr>
                            @if(isset($item->comentariosCliente))
                                <tr>
                                    <td colspan="4" class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                                        Comentários pessoais: {{ $item->comentariosCliente }}
                                    </td>
                                </tr>
                            @endif

                            @if(!empty($item->areasImpactadas))
                            <tr>
                                <td colspan="4" class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                                    Áreas Impactadas: 
                                    @foreach ($item->areasImpactadas as $areaImpactada)
                                        {{ $areaImpactada }}
                                    @endforeach
                                    {{ $item->textoResposta->textoResposta }}

                                </td>
                            </tr>

                            @endif
                    @endforeach
                    
                    <tr>
                      <td colspan="4">
                        <div class="mt-8 sm:mt-12">
                          {{-- <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Como entender o seu resultado de estresse e fadiga:<br></h4> --}}
                          <p class="text-xs text-black dark:text-neutral-500">{!! $dadosRelatorio['textoFecha'] !!}</p>
                        </div>
                      </td>
                    </tr>
                </tbody>
            </table>

          <!-- End Table -->
          <!-- ===================> FIM Devolutiva quanto a hipótese de TDA ou TDAH <================== -->


          
          
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
    
     