@extends('pdf.layout')

@section('title', 'Inventário para Fobia Social ou Distúrbio de Ansiedade')

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

    {{-- INFORMAÇÕES DO CLIENTE --}}
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

    {{-- SEÇÃO DE RESULTADOS --}}
    <h2 class="mt-4">Inventário para Fobia Social ou Distúrbio de Ansiedade</h2>
    
    <div class="report-box">
        @php $currentSubHeading = ''; @endphp
        @foreach ($dadosRelatorio['resultadoTeste'] as $item)
            @php
                // Determina o subtítulo do grupo de respostas
                $subHeading = match ($item->sequencia) {
                    1 => 'Componentes de Ansiedade [CID 10 F41]:',
                    64 => 'Componentes de TDA e Hiperatividade [CID 10 F90]:',
                    69 => 'Componentes de Alteração do Humor [CID 10 F30.1]:',
                    79 => 'Componentes de TDA(H) e Impulsividade [CID 10 F90]:',
                    default => '',
                };
            @endphp

            {{-- Exibe o subtítulo apenas quando ele muda --}}
            @if ($subHeading && $subHeading !== $currentSubHeading)
                <p class="response-group-title">{{ $subHeading }}</p>
                @php $currentSubHeading = $subHeading; @endphp
            @endif
            
            @if(isset($item->textoResposta->textoResposta))
                @php
                    // Determina a classe de cor com base no numSeqResp
                    $textColorClass = match ($item->opcaoResposta->numSeqResp) {
                        2 => 'text-status-blue',
                        3 => 'text-status-orange',
                        4 => 'text-status-red',
                        default => 'text-status-green',
                    };
                @endphp
                <div class="result-item">
                    <p class="{{ $textColorClass }}">
                        {!! $item->textoResposta->textoResposta !!}
                    </p>
                    @if(isset($item->comentariosCliente))
                        <div class="comment {{ $textColorClass }}">
                           <strong>Comentário:</strong> {{ $item->comentariosCliente }}
                        </div>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
    
    {{-- TEXTOS DE CONCLUSÃO --}}
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoFecha'] !!}</p>
        <p>{!! $dadosRelatorio['textoRodape'] !!}</p>
    </div>

@endsection