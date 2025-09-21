@extends('pdf.layout')

@section('title', 'Relatório de Resiliência e Tensão de Base')

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
    
    @if ($chartImageUrl)
        <div class="text-center mt-4">
            <img src="{{ $chartImageUrl }}" style="width: 100%; height: auto;" alt="Gráfico Percepção de Cansaço">
        </div>
    @endif
    
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoIntro'] !!}</p>
    </div>

    <h2 class="mt-4">Ações Recomendadas</h2>
    <table class="report-table">
        <tbody>
            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                @if (isset($item->textoResposta->textoResposta))
                    <tr>
                        <td>{!! $item->textoResposta->textoResposta !!}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    
    <h3 class="mt-4 font-bold">Resumo das Contagens e Índice Final:</h3>
    <table class="report-table">
        <tbody>
            <tr>
                <td style="width: 50%;" class="font-bold">Contagem de Fatores Negativos:</td>
                <td class="text-center">{{ $contarNegativos }}</td>
            </tr>
            <tr>
                <td class="font-bold">Contagem de Fatores Positivos:</td>
                <td class="text-center">{{ $contarPositivos }}</td>
            </tr>
            <tr>
                <td class="font-bold">Diferença (Negativos - Positivos):</td>
                <td class="text-center">{{ $diferencaPositNegat }}</td>
            </tr>
             <tr>
                <td class="font-bold">Célula D38 (Cont. Negativos + Diferença):</td>
                <td class="text-center">{{ $celulaD38 }}</td>
            </tr>
            <tr style="background-color: #e2e8f0;">
                <td class="font-bold">Índice de Cansaço (Célula D38 / 24):</td>
                <td class="font-bold text-center">{{ number_format($indiceCansaco, 2, ',') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoFecha'] !!}</p>
        <p>{!! $dadosRelatorio['textoRodape'] !!}</p>
    </div>

@endsection