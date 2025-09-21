@extends('pdf.layout')

@section('title', 'Relatório de Sensualidade e Neurodivergências')

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
    {{-- FIM DO CABEÇALHO --}}

    {{-- TEXTO INTRODUTÓRIO --}}
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoIntro'] !!}</p>
    </div>

    {{-- SEÇÃO DE RESULTADOS --}}
    <h2 class="mt-4">PONTUAÇÃO e COMENTÁRIOS</h2>
    
    <table class="report-table">
        <tbody>
            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                @if (isset($item->textoResposta->textoResposta))
                    @php
                        // Determina a classe da cor do texto
                        $textColorClass = '';
                        if ($item->opcaoResposta->numSeqResp == 4 || $item->opcaoResposta->numSeqResp == 5) {
                            $textColorClass = 'text-status-red';
                        }
                        
                        // Determina a classe da cor de fundo
                        $backgroundClass = '';
                        if ($item->opcaoResposta->numSeqResp == 5) {
                            $backgroundClass = 'highlight-background';
                        }
                    @endphp
                    
                    <tr class="{{ $backgroundClass }}">
                        <td>
                            <p class="{{ $textColorClass }}">
                                {!! $item->textoResposta->textoResposta !!}
                            </p>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    
    {{-- TEXTOS DE CONCLUSÃO --}}
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoFecha'] !!}</p>
        <p>{!! $dadosRelatorio['textoRodape'] !!}</p>
    </div>

@endsection