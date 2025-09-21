@extends('pdf.layout')

@section('title', 'Relatório - Inventário para TDA / TDAH')

@section('content')
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

    {{-- TEXTO INTRODUTÓRIO --}}
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoIntro'] !!}</p>
    </div>

    {{-- SEÇÃO: PRIMEIRA DEVOLUTIVA --}}
    <h2 class="mt-4">Devolutiva quanto a hipótese de TDA ou TDAH</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th class="text-center" style="width: 10%;">Item Pontuado</th>
                <th class="text-center" style="width: 10%;">Frequente</th>
                <th class="text-center" style="width: 10%;">Muito Frequente</th>
                <th>Detalhes a serem observados no processo psicoterapêutico:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                @if($item->pergunta->codGrupoOpcRespostas == 'GOR09-1')
                    <tr>
                        <td class="text-center">{{ $item->sequencia }}</td>
                        <td class="text-center">@if ($item->opcaoResposta->numSeqResp == 3) X @else &nbsp; @endif</td>
                        <td class="text-center">@if ($item->opcaoResposta->numSeqResp == 4) X @else &nbsp; @endif</td>
                        <td>
                            @if($item->opcaoResposta->numSeqResp >= 3)
                                <p>{{ $item->pergunta->enunciado }}</p>
                                @if(isset($item->areasImpactadas) && count($item->areasImpactadas) > 0)
                                    <p class="comment">
                                        @foreach ($item->areasImpactadas as $areaImpactada)
                                            {{ $areaImpactada }}
                                            @if(str_contains($areaImpactada, 'Repercutindo na Autoconfiança'))
                                                (Intensidade: {{ $item->intensidadeTextoResposta }})
                                            @endif
                                        @endforeach
                                    </p>
                                @endif
                                <p class="comment">{{ $item->textoResposta->textoResposta }}</p>
                                @if(isset($item->comentariosCliente))
                                    <p class="comment"><strong>Comentário:</strong> {{ $item->comentariosCliente }}</p>
                                @endif
                            @else
                                <p>{{ $item->textoResposta->textoResposta }}</p>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
            {{-- Linha de Totais --}}
            <tr>
                <td class="font-bold text-center">Totais:</td>
                <td class="font-bold text-center">{{ $testeSomaC133 }}</td>
                <td class="font-bold text-center">{{ $testeSomaD133 }}</td>
                <td></td>
            </tr>
             {{-- Linha de Diagnóstico --}}
            <tr>
                <td colspan="4" style="padding: 10px;">{!! $textoDiagnostico !!}</td>
            </tr>
        </tbody>
    </table>

    {{-- SEÇÃO: RE-TESTE --}}
    <h2 class="mt-4">RE-TESTE para consolidar a hipótese de TDA ou TDAH</h2>
    <table class="report-table">
         <thead>
            <tr>
                <th class="text-center" style="width: 10%;">Item Pontuado</th>
                <th class="text-center" style="width: 10%;">Frequente</th>
                <th class="text-center" style="width: 10%;">Muito Frequente</th>
                <th>Detalhes a serem observados no processo psicoterapêutico:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                @if($item->pergunta->codGrupoOpcRespostas == 'GOR09-2')
                    <tr>
                        <td class="text-center">{{ $item->sequencia }}</td>
                        <td class="text-center">@if ($item->opcaoResposta->numSeqResp == 3) X @else &nbsp; @endif</td>
                        <td class="text-center">@if ($item->opcaoResposta->numSeqResp == 4) X @else &nbsp; @endif</td>
                        <td>
                            @if($item->opcaoResposta->numSeqResp >= 3)
                                <p>{{ $item->pergunta->enunciado }}</p>
                            @else
                                <p>{{ $item->textoResposta->textoResposta }}</p>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
            {{-- Linha de Totais --}}
            <tr>
                <td class="font-bold text-center">Totais:</td>
                <td class="font-bold text-center">{{ $retesteSomaC214 }}</td>
                <td class="font-bold text-center">{{ $retesteSomaD214 }}</td>
                <td></td>
            </tr>
            {{-- Linha de Diagnóstico --}}
            <tr>
                <td colspan="4" style="padding: 10px;">{!! $textoDiagnosticoReteste !!}</td>
            </tr>
        </tbody>
    </table>

    {{-- TEXTOS DE CONCLUSÃO --}}
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoFecha'] !!}</p>
        <p>{!! $dadosRelatorio['textoRodape'] !!}</p>
    </div>

@endsection