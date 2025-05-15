

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
                <h2 class="text-xl font-semibold text-blue-600 mb-2">Devolutiva quanto a hipótese de TDA ou TDAH</h2>
                {{-- <div class="text-xs p-1 font-semibold text-gray-800 uppercase dark:text-neutral-500">Minhas percepções nos últimos 90 dias e a avaliação recebida</div> --}}
                {{-- <div class="col-span-5 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Pergunta do teste</div>
                <div class="col-span-3 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Resposta</div>
                <div class="col-span-3 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Comentários do Cliente</div> --}}
              </div>
    
              <div class=" border-b border-gray-200 dark:border-neutral-700"></div>

              <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-blue-100 dark:bg-dark-3 text-gray-700 dark:text-gray-300 text-xs font-bold">
                        <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Item<br>Pontuado</th>
                        <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Frequen-<br>temente</th>
                        <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Muito Fre-<br>quentemente</th>
                        <th class="border border-gray-300 py-1 px-2 text-left w-auto">Detalhes a serem observados no processo psicoterapêutico:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                        @if($item->pergunta->codGrupoOpcRespostas == 'GOR09-1')
                            <tr>
                                <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">{{ $item->sequencia }}</td>
                                <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">
                                    @if ($item->opcaoResposta->numSeqResp == 3)
                                        x
                                    @else
                                        &nbsp;
                                    @endif
                                </td>
                                <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">
                                    @if ($item->opcaoResposta->numSeqResp == 4)
                                        x
                                    @else
                                        &nbsp;
                                    @endif
                                </td>
                                <td class="border border-gray-300 py-2 px-4 text-left text-sm dark:text-gray-400 align-top">
                                    @if($item->opcaoResposta->numSeqResp == 3 or $item->opcaoResposta->numSeqResp == 4)
                                        <p class="mb-1">{{ $item->pergunta->enunciado }}</p>
                                        @if(isset($item->areasImpactadas))
                                            <p class="mb-1">
                                                @foreach ($item->areasImpactadas as $areaImpactada)
                                                    {{ $areaImpactada }}
                                                    @if(str_contains($areaImpactada, 'Repercutindo na Autoconfiança'))
                                                        Intesidade atribuída: {{ $item->intensidadeTextoResposta }}
                                                    @endif
                                                @endforeach
                                            </p>
                                        @endif
                                        <p class="mb-1">{{ $item->textoResposta->textoResposta }}</p>
                                        @if(isset($item->comentariosCliente))
                                            <p class="text-xs">Comentário: {{ $item->comentariosCliente }}</p>
                                        @endif
                                    @else
                                        <p class="mb-1">{{ $item->textoResposta->textoResposta }}</p>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td></td>
                        <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">{{ $testeSomaC133 }}</td>
                        <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">{{ $testeSomaD133 }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3" class="border border-gray-300 py-2 px-4 text-sm dark:text-gray-400">{!! $textoDiagnostico !!}</td>
                    </tr>

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


          <!-- ===================> INICIO RE-TESTE para consolidar a hipótese de TDA ou TDAH <================== -->
          
          {{-- linha de separação --}}
          <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
              <div class="">
                <h2 class="text-xl font-semibold text-blue-600 mb-2">RE-TESTE para consolidar a hipótese de TDA ou TDAH</h2>
                {{-- <div class="text-xs p-1 font-semibold text-gray-800 uppercase dark:text-neutral-500">Minhas percepções nos últimos 90 dias e a avaliação recebida</div> --}}
                {{-- <div class="col-span-5 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Pergunta do teste</div>
                <div class="col-span-3 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Resposta</div>
                <div class="col-span-3 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Comentários do Cliente</div> --}}
              </div>
    
              <div class=" border-b border-gray-200 dark:border-neutral-700"></div>

              <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-blue-100 dark:bg-dark-3 text-gray-700 dark:text-gray-300 text-xs font-bold">
                        <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Item<br>Pontuado</th>
                        <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Frequen-<br>temente</th>
                        <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Muito Fre-<br>quentemente</th>
                        <th class="border border-gray-300 py-1 px-4 text-left w-auto">Detalhes a serem observados no processo psicoterapêutico:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                        @if($item->pergunta->codGrupoOpcRespostas == 'GOR09-2')
                            <tr>
                                <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">{{ $item->sequencia }}</td>
                                <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">
                                    @if ($item->opcaoResposta->numSeqResp == 3)
                                        x
                                    @else
                                        &nbsp;
                                    @endif
                                </td>
                                <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">
                                    @if ($item->opcaoResposta->numSeqResp == 4)
                                        x
                                    @else
                                        &nbsp;
                                    @endif
                                </td>
                                <td class="border border-gray-300 py-2 px-4 text-left text-sm dark:text-gray-400 align-top">
                                    @if($item->opcaoResposta->numSeqResp == 3 or $item->opcaoResposta->numSeqResp == 4)
                                        <p class="mb-1">{{ $item->pergunta->enunciado }}</p>
                                        @if(isset($item->areasImpactadas))
                                            <p class="mb-1">
                                                @foreach ($item->areasImpactadas as $areaImpactada)
                                                    {{ $areaImpactada }}
                                                    @if(str_contains($areaImpactada, 'Repercutindo na Autoconfiança'))
                                                        Intesidade atribuída: {{ $item->intensidadeTextoResposta }}
                                                    @endif
                                                @endforeach
                                            </p>
                                        @endif
                                        <p class="mb-1">{{ $item->textoResposta->textoResposta }}</p>
                                        @if(isset($item->comentariosCliente))
                                            <p class="text-xs">Comentário: {{ $item->comentariosCliente }}</p>
                                        @endif
                                    @else
                                        <p class="mb-1">{{ $item->textoResposta->textoResposta }}</p>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td></td>
                        <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">{{ $retesteSomaC214 }}</td>
                        <td class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">{{ $retesteSomaD214 }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3" class="border border-gray-300 py-2 px-4 text-sm dark:text-gray-400">{!! $textoDiagnosticoReteste !!}</td>
                    </tr>
                </tbody>
            </table>
    
          
    
          
          
          
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
    
     