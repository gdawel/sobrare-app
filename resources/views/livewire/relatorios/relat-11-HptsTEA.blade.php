

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
        {{-- Preparação dos Cálculos Percentuais e Contagens para o Relatório --}}
            @php
            $contaNeuroTipico = 0;
            $contaNeuroDivergente = 0;
            $contarHabilidadesSociais = 0;
            $contarAtencaoDetalhes = 0;
            $contarClarezaComunicacao = 0;
            $contarHiperfoco = 0;
            $contarUsoImaginacao = 0;
            $contarNaoSeAplica = 0;
            @endphp

            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
            @php
                $textoCompleto = $item->textoResposta->textoResposta;

                // Encontra as posições dos delimitadores
                $posParte1 = strpos($textoCompleto, '|');
                $posParte2 = strpos($textoCompleto, '||');

                // Extrai as substrings
                if ($posParte1 !== false && $posParte2 !== false) {
                    $classifNeuro = substr($textoCompleto, 0, $posParte1);
                    $areasMapeadas = substr($textoCompleto, $posParte1 + 1, $posParte2 - ($posParte1 + 1));
                    $anomalidadePercebida = substr($textoCompleto, $posParte2 + 2);

                    // Conta 'neurotipico' e 'neurodivergente' (case-insensitive)
                    if (stripos($classifNeuro, 'neurotípico') !== false) {
                        $contaNeuroTipico++;
                    } elseif (stripos($classifNeuro, 'neurodivergente') !== false) {
                        $contaNeuroDivergente++;
                    }

                    // Conta ocorrências em $areasMapeadas (case-insensitive)
                    if (stripos($anomalidadePercebida, 'Dificuldades com as habilidades sociais') !== false) {
                        $contarHabilidadesSociais++;
                    }
                    if (stripos($anomalidadePercebida, 'distração e mudança de atenção') !== false) {
                        $contarAtencaoDetalhes++;
                    }
                    if (stripos($anomalidadePercebida, 'clareza na comunicação') !== false) {
                        $contarClarezaComunicacao++;
                    }
                    if (stripos($anomalidadePercebida, 'excepcional concentração na atividade') !== false) {
                        $contarHiperfoco++;
                    }

                    if (stripos($anomalidadePercebida, 'uso e aplicações da imaginação') !== false) {
                        $contarUsoImaginacao++;
                    }
                    if (stripos($anomalidadePercebida, 'não se aplica') !== false) {
                        $contarNaoSeAplica++;
                    }
                }
            @endphp

            {{-- <p>Classificação Neuro: {{ $classifNeuro ?? 'N/A' }}</p>
            <p>Áreas Mapeadas: {{ $areasMapeadas ?? 'N/A' }}</p>
            <p>Anomalidade Percebida: {{ $anomalidadePercebida ?? 'N/A' }}</p>
            <hr> --}}
            @endforeach

            {{-- <p>Total de Neurotípicos: {{ $contaNeuroTipico }}</p>
            <p>Total de Neurodivergentes: {{ $contaNeuroDivergente }}</p>
            <p>Total de Habilidades Sociais: {{ $contarHabilidadesSociais }}</p>
            <p>Total de Atenção a Detalhes: {{ $contarAtencaoDetalhes }}</p>
            <p>Total de Clareza na Comunicação: {{ $contarClarezaComunicacao }}</p>
            <p>Total de Hiperfoco: {{ $contarHiperfoco }}</p>
            <p>Total de Uso da Imaginação: {{ $contarUsoImaginacao }}</p>
            <p>Total de Não se Aplica: {{ $contarNaoSeAplica }}</p> --}}
            
            @php
                $percentHabilidades = $contarHabilidadesSociais / 50 * 100;
                $percentAtencao = $contarAtencaoDetalhes / 50 * 100;
                $percentClareza = $contarClarezaComunicacao / 50 * 100;
                $percentHiperfoco = $contarHiperfoco / 50 * 100;
                $percentImaginacao = $contarUsoImaginacao / 50 * 100;
                $frequenciaProbabilidade = $percentHabilidades + $percentAtencao + $percentClareza +
                                            $percentHiperfoco + $percentImaginacao;

            @endphp

            {{-- <p>Percentual de Habilidades Sociais: {{ $percentHabilidades }}</p>
            <p>Percentual de Atenção a Detalhes: {{ $percentAtencao }}</p>
            <p>Percentual de Clareza na Comunicação: {{ $percentClareza }}</p>
            <p>Percentual de Hiperfoco: {{ $percentHiperfoco }}</p>
            <p>Percentual de Uso da Imaginação: {{ $percentImaginacao }}</p> --}}
    
          {{-- @dd($dadosRelatorio); --}}
          
          
          {{-- ///  RELATÓRIO HIPÓTESE DE TEA - NÍVEL 1 --}}
          <div class="mt-6">
            <div class="border border-gray-200 p-3 rounded-lg space-y-6 dark:border-neutral-700">
        
                {{-- linha de separação --}}
            {{-- <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div> --}}
                  
              <div class=" border-b border-gray-200 dark:border-neutral-700"></div>

                <p class="border border-gray-300 py-1 px-2 text-lg dark:text-gray-800 align-top">
                        Frequência de probabilidade: {{ $frequenciaProbabilidade }} <br>
                        [Linha de corte: 32] 
                
                        Pontuação obtida no inventário: {{ $contaNeuroDivergente }}
                </p>

            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-blue-100 dark:bg-dark-3 text-gray-700 dark:text-gray-300 text-sm font-bold">
                        <th class="border border-gray-300 py-1 px-2 text-center w-1/12">%</th>
                        <th class="border border-gray-300 py-1 px-2 text-left w-4/12">Áreas mapeadas na cognição</th>
                        
                        <th class="border border-gray-300 py-1 px-2 text-left w-auto">Detalhes a serem observados no processo psicoterapêutico:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 py-1 px-2 text-xs text-center dark:text-gray-400 align-top">
                            {{ $percentHabilidades }}
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                            a) Área de "Habilidades Sociais"
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                            Anormalidade percebida: Dificuldades com as habilidades sociais

                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 py-1 px-2 text-xs text-center dark:text-gray-400 align-top">
                            {{ $percentAtencao }}
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                            b) Área de "Atenção para detalhes"
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                            Anormalidade percebida: distração e mudança de atenção nas atividades e ou forte foco de atenção.
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 py-1 px-2 text-xs text-center dark:text-gray-400 align-top">
                            {{ $percentClareza }}
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                            c) Área de "Clareza na comunicação"
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                            Anormalidade percebida: problemas com a clareza na comunicação
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 py-1 px-2 text-xs text-center dark:text-gray-400 align-top">
                            {{ $percentHiperfoco }}
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                            d) Área de "Mudar o foco de concentração (Hiperfoco)"
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                            Anormalidade percebida: excepcional concentração na atividade ou flutuar a atenção entre pontos / partes / etapas nas atividades.
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 py-1 px-2 text-xs text-center dark:text-gray-400 align-top">
                            {{ $percentImaginacao }}
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                            e) Área do "Uso da Imaginação"
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                            Anormalidade percebida: dificuldades em exercitar o uso e aplicações da imaginação. Avaliar se para interpretação do significado ou para lógica / matemática
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 py-1 px-2 text-sm text-center dark:text-gray-400 align-top">
                            &nbsp;
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-sm dark:text-gray-400 align-top">
                            Número de ítens: 50
                        </td>
                        <td class="border border-gray-300 py-1 px-2 text-sm text-red-600 font-bold dark:text-gray-400 align-top">
                            @if($contaNeuroDivergente >= 32)
                                Elevada hipótese para a presença de neurodivergências inclusas nas características de TEA Nível 1 [conhecida como Síndrome de Asperger]"
                            @else
                                "Sem indicação para a hipótese de TEA"
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12" class="border border-gray-300 py-1 px-2 text-sm text-left dark:text-gray-400 align-top">
                            Observação: Quando ambas as áreas "b" e "d" estiverem com % de ocorrência acima de 10% presentes, investigar quando cada uma tem sua maior incidência no comportamento expresso.
                        </td>
                    </tr>
                </tbody>
            </table>
                    <div class="mt-2">
                        <p class="block text-xs text-black dark:text-neutral-200">{!! $dadosRelatorio['textoRodape'] !!}</p>
                        
                    </div>

        {{-- ///  RELATÓRIO DE SUBSÍDIOS PARA A HIPÓTESE DE TEA - NÍVEL 1 --}}

                <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
                    <div class="">
                      <h2 class="text-xl font-semibold text-blue-600 mb-2">Subsídios para a hipótese de TEA - Nível 1 (antiga Síndrome de Asperger)</h2>
                      
                    </div>
                    <div class="mt-2">
                        <p class="block text-xs text-black dark:text-neutral-200">{!! $dadosRelatorio['textoIntro'] !!}</p>
                        
                    </div>
          
                    {{-- <div class=" border-b border-gray-200 dark:border-neutral-700"></div> --}}
                    <p class="border border-gray-300 py-1 px-2 text-lg dark:text-gray-800 align-top">
                        Pontuação da avaliação: {{ $contaNeuroDivergente }}
                    </p>
      
                    <table class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-blue-100 dark:bg-dark-3 text-gray-700 dark:text-gray-300 text-sm font-bold">
                                <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Seq.</th>
                                <th class="border border-gray-300 py-1 px-2 text-left w-4/12">Áreas mapeadas na cognição</th>
                                
                                <th class="border border-gray-300 py-1 px-2 text-left w-auto">Este mapeamento é um indicativo para a hipótese diagnóstica. E1plicita as ocorrências presentes em áreas cognitivas e que são subsídios ao processo psicoterapêutico:
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                                   
                            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                                    @php
                                        $textoCompleto = $item->textoResposta->textoResposta;
                        
                                        // Encontra as posições dos delimitadores
                                        $posParte1 = strpos($textoCompleto, '|');
                                        $posParte2 = strpos($textoCompleto, '||');
                        
                                        // Extrai as substrings
                                        if ($posParte1 !== false && $posParte2 !== false) {
                                            $classifNeuro = substr($textoCompleto, 0, $posParte1);
                                            $areasMapeadas = substr($textoCompleto, $posParte1 + 1, $posParte2 - ($posParte1 + 1));
                                            $anomalidadePercebida = substr($textoCompleto, $posParte2 + 2);
                                        };
                                    @endphp
                        
                                    
                                    <tr>
                                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                                            {{ $item->sequencia }}
                                        </td>
                                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                                            {{ $areasMapeadas }}
                                        </td>
                                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                                            {{ $anomalidadePercebida }}
                                        </td>
                                    </tr>
                            @endforeach
                    
                        </tbody>
            </table>

          <!-- End Table -->
          <!-- ===================> FIM Devolutiva quanto a hipótese de TDA ou TDAH <================== -->

            <div class="mt-2">
              <p class="block text-xs text-black dark:text-neutral-200">{!! $dadosRelatorio['textoFecha'] !!}</p>
              
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
    
     