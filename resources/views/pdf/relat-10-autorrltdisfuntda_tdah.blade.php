@extends('pdf.layout')

@section('title', 'Autorrelato para hipótese em TDA_TDAH e Neurodivergência')

@section('content')
    {{-- CORREÇÃO: CABEÇALHO PADRÃO ADICIONADO --}}
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

    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoIntro'] !!}</p>
    </div>

    <h2 class="mt-4">Subsídios e contribuições para o processo de tratamento terapêutico</h2>
    
    <table class="report-table">
        <thead>
            <tr>
                <th style="width: 55%;">Detalhes a serem observados no processo psicoterapêutico:</th>
                <th class="text-center" style="width: 15%;">Sim, isso<br>aconteceu</th>
                <th class="text-center" style="width: 15%;">Na<br>infância</th>
                <th class="text-center" style="width: 15%;">Na vida<br>adulta</th>
            </tr>
        </thead>
        <tbody>
            @php $currentSubHeading = ''; @endphp
            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                @php
                    $subHeading = match ($item->sequencia) {
                        1 => 'TDA/TDAH e autorrelatos no desempenho escolar:',
                        12 => 'TDA/TDAH e autorrelatos na relações familiares e interpessoais:',
                        23 => 'TDA/TDAH e autorrelatos no desempenho profissional:',
                        32 => 'TDA/TDAH e autorrelatos na autoimagem e estima:',
                        default => '',
                    };
                @endphp

                @if ($subHeading && $subHeading !== $currentSubHeading)
                    <tr>
                        <td colspan="4" class="response-group-title" style="border: none; border-top: 1px solid #ddd; padding-top: 10px;">{{ $subHeading }}</td>
                    </tr>
                    @php $currentSubHeading = $subHeading; @endphp
                @endif
            
                <tr>
                    <td>
                        @php
                            $posicao = strpos($item->textoResposta->textoResposta, ': ');
                            $textoPergunta = ($posicao !== false) ? substr($item->textoResposta->textoResposta, $posicao + 2) : $item->textoResposta->textoResposta;
                        @endphp
                        {{ $textoPergunta }}
                    </td>
                    <td class="text-center">
                        @if ($item->opcaoResposta->numSeqResp == 2) X @else &nbsp; @endif
                    </td>
                    <td class="text-center">
                        @if (collect($item->areasImpactadas)->contains(fn($value) => stripos($value, 'infância') !== false)) X @else &nbsp; @endif
                    </td>
                    <td class="text-center">
                        @if (collect($item->areasImpactadas)->contains(fn($value) => stripos($value, 'vida adulta') !== false)) X @else &nbsp; @endif
                    </td>
                </tr>

                @if(isset($item->comentariosCliente))
                    <tr style="page-break-inside: avoid;">
                        <td colspan="4">
                            <div class="comment">
                               <strong>Comentários pessoais:</strong> {{ $item->comentariosCliente }}
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoFecha'] !!}</p>
        <p>{!! $dadosRelatorio['textoRodape'] !!}</p>
    </div>

@endsection