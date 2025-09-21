@extends('pdf.layout')

@section('title', 'Relatório de Hipótese de TEA - Nível 1')

@section('content')
    @php
        // Bloco PHP para fazer os cálculos antes de renderizar a tabela
        $contaNeuroTipico = 0;
        $contaNeuroDivergente = 0;
        $contarHabilidadesSociais = 0;
        $contarAtencaoDetalhes = 0;
        $contarClarezaComunicacao = 0;
        $contarHiperfoco = 0;
        $contarUsoImaginacao = 0;
        $contarNaoSeAplica = 0;

        foreach ($dadosRelatorio['resultadoTeste'] as $item) {
            if (isset($item->textoResposta->textoResposta)) {
                $textoCompleto = $item->textoResposta->textoResposta;
                $posParte1 = strpos($textoCompleto, '|');
                $posParte2 = strpos($textoCompleto, '||');

                if ($posParte1 !== false && $posParte2 !== false) {
                    $classifNeuro = substr($textoCompleto, 0, $posParte1);
                    $anomalidadePercebida = substr($textoCompleto, $posParte2 + 2);

                    if (stripos($classifNeuro, 'neurotípico') !== false) $contaNeuroTipico++;
                    elseif (stripos($classifNeuro, 'neurodivergente') !== false) $contaNeuroDivergente++;

                    if (stripos($anomalidadePercebida, 'Dificuldades com as habilidades sociais') !== false) $contarHabilidadesSociais++;
                    if (stripos($anomalidadePercebida, 'distração e mudança de atenção') !== false) $contarAtencaoDetalhes++;
                    if (stripos($anomalidadePercebida, 'clareza na comunicação') !== false) $contarClarezaComunicacao++;
                    if (stripos($anomalidadePercebida, 'excepcional concentração na atividade') !== false) $contarHiperfoco++;
                    if (stripos($anomalidadePercebida, 'uso e aplicações da imaginação') !== false) $contarUsoImaginacao++;
                    if (stripos($anomalidadePercebida, 'não se aplica') !== false) $contarNaoSeAplica++;
                }
            }
        }
        
        $percentHabilidades = ($contaNeuroDivergente > 0) ? ($contarHabilidadesSociais / $contaNeuroDivergente) * 100 : 0;
        $percentAtencao = ($contaNeuroDivergente > 0) ? ($contarAtencaoDetalhes / $contaNeuroDivergente) * 100 : 0;
        $percentClareza = ($contaNeuroDivergente > 0) ? ($contarClarezaComunicacao / $contaNeuroDivergente) * 100 : 0;
        $percentHiperfoco = ($contaNeuroDivergente > 0) ? ($contarHiperfoco / $contaNeuroDivergente) * 100 : 0;
        $percentImaginacao = ($contaNeuroDivergente > 0) ? ($contarUsoImaginacao / $contaNeuroDivergente) * 100 : 0;
        $frequenciaProbabilidade = $percentHabilidades + $percentAtencao + $percentClareza + $percentHiperfoco + $percentImaginacao;
    @endphp

    {{-- CABEÇALHO PADRÃO --}}
    <table class="w-100">
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <img src="{{ public_path('images/sobrare_logo_1.jpg') }}" style="height: 60px;">
                <h1 style="text-align: left; font-size: 18px; margin-top: 50px;">{{ $dadosRelatorio['tituloTeste'] }}</h1>
            </td>
            <td style="width: 50%; vertical-align: top; text-align: right;">
                <img src="{{ public_path('images/logo_neudiv_1.jpg') }}" style="height: 60px;">
                <h2 style="font-size: 16px; border: none; margin-top: 10px;">NEURODIVERSIDADE</h2>
                <p>
                    <strong>Cod. interno:</strong> {{ $dadosRelatorio['orders_id'] }}/{{ $dadosRelatorio['idadeCliente'] }}-{{ $dadosRelatorio['estadoNascimentoCliente'] }}
                </p>
            </td>
        </tr>
    </table>

    <table class="w-100" style="margin-top: 20px; margin-bottom: 20px;">
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <strong>Para:</strong> {{ $dadosRelatorio['nomeCliente'] }}<br>
                <strong>Idade:</strong> {{ $dadosRelatorio['idadeCliente'] }}
            </td>
            <td style="width: 50%; vertical-align: top; text-align: right;">
                <strong>Emitido em:</strong> {{ $dadosRelatorio['dataEmissao'] }}<br>
                <strong>Respondido em:</strong> {{ $dadosRelatorio['dataFinalTeste'] }}
            </td>
        </tr>
    </table>
    {{-- FIM DO CABEÇALHO --}}

    <table class="report-table" style="margin-top: 20px;">
        <tbody>
            <tr>
                <td class="font-bold">Frequência de probabilidade: {{ number_format($frequenciaProbabilidade, 2, ',', '.') }}%</td>
                <td class="font-bold">Linha de corte: 32%</td>
                <td class="font-bold">Pontuação obtida no inventário: {{ $contaNeuroDivergente }}</td>
            </tr>
        </tbody>
    </table>
    
    <h2 class="mt-4">Subsídios para a hipótese de TEA - Nível 1 (antiga Síndrome de Asperger)</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th class="text-center" style="width: 10%;">%</th>
                <th style="width: 30%;">Áreas mapeadas na cognição</th>
                <th>Detalhes a serem observados no processo psicoterapêutico:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">{{ number_format($percentHabilidades, 0) }}%</td>
                <td>a) Área de "Habilidades Sociais"</td>
                <td>Anormalidade percebida: Dificuldades com as habilidades sociais</td>
            </tr>
            <tr>
                <td class="text-center">{{ number_format($percentAtencao, 0) }}%</td>
                <td>b) Área de "Atenção para detalhes"</td>
                <td>Anormalidade percebida: distração e mudança de atenção nas atividades e ou forte foco de atenção.</td>
            </tr>
            <tr>
                <td class="text-center">{{ number_format($percentClareza, 0) }}%</td>
                <td>c) Área de "Clareza na comunicação"</td>
                <td>Anormalidade percebida: problemas com a clareza na comunicação</td>
            </tr>
            <tr>
                <td class="text-center">{{ number_format($percentHiperfoco, 0) }}%</td>
                <td>d) Área de "Mudar o foco de concentração (Hiperfoco)"</td>
                <td>Anormalidade percebida: excepcional concentração na atividade ou flutuar a atenção entre pontos / partes / etapas nas atividades.</td>
            </tr>
            <tr>
                <td class="text-center">{{ number_format($percentImaginacao, 0) }}%</td>
                <td>e) Área do "Uso da Imaginação"</td>
                <td>Anormalidade percebida: dificuldades em exercitar o uso e aplicações da imaginação. Avaliar se para interpretação do significado ou para lógica / matemática</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Número de ítens: 50</td>
                <td class="font-bold" style="color: #c0392b;">
                    @if($contaNeuroDivergente >= 32)
                        Elevada hipótese para a presença de neurodivergências inclusas nas características de TEA Nível 1 [conhecida como Síndrome de Asperger]
                    @else
                        Sem indicação para a hipótese de TEA
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3" style="font-size: 9px; font-style: italic;">
                    Observação: Quando ambas as áreas "b" e "d" estiverem com % de ocorrência acima de 10% presentes, investigar quando cada uma tem sua maior incidência no comportamento expresso.
                </td>
            </tr>
        </tbody>
    </table>

    {{-- LINHA ADICIONADA PARA FORÇAR A QUEBRA DE PÁGINA --}}
    <div style="page-break-before: always;"></div>
    
    <h2 class="mt-4">Este mapeamento é um indicativo para a hipótese diagnóstica:</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th style="width: 10%;">Seq.</th>
                <th style="width: 35%;">Áreas mapeadas na cognição</th>
                <th>Anormalidade Percebida</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                @php
                    $areasMapeadas = '';
                    $anomalidadePercebida = '';
                    if (isset($item->textoResposta->textoResposta)) {
                        $textoCompleto = $item->textoResposta->textoResposta;
                        $posParte1 = strpos($textoCompleto, '|');
                        $posParte2 = strpos($textoCompleto, '||');
                        if ($posParte1 !== false && $posParte2 !== false) {
                            $areasMapeadas = substr($textoCompleto, $posParte1 + 1, $posParte2 - ($posParte1 + 1));
                            $anomalidadePercebida = substr($textoCompleto, $posParte2 + 2);
                        }
                    }
                @endphp
                <tr>
                    <td class="text-center">{{ $item->sequencia }}</td>
                    <td>{{ $areasMapeadas }}</td>
                    <td>{{ $anomalidadePercebida }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoFecha'] !!}</p>
        <p>{!! $dadosRelatorio['textoRodape'] !!}</p>
    </div>

@endsection