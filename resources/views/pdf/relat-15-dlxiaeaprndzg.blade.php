@extends('pdf.layout')

@section('title', 'Relatório - Características ligadas à Dislexia e Atenção')

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
    
    {{-- Tabela Principal de Resultados --}}
    <h2 class="mt-4">Resultados e Orientações</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th>Respostas do Teste</th>
            </tr>
        </thead>
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

    {{-- Tabela de Totais e Diagnóstico --}}
    <h3 class="mt-4 font-bold">Resumo das Contagens e Diagnóstico:</h3>
    <table class="report-table">
        <tbody>
            <tr>
                <td style="width: 25%;" class="font-bold">É Raro:</td>
                <td>{{ $contarRaro }}</td>
            </tr>
            <tr>
                <td class="font-bold">Algumas Vezes:</td>
                <td>{{ $contarAlgumasVezes }}</td>
            </tr>
            <tr>
                <td class="font-bold">Acontece Bastante:</td>
                <td>{{ $contarAconteceBastante }}</td>
            </tr>
            <tr>
                <td class="font-bold">Frequente:</td>
                <td>{{ $contarFrequente }}</td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 10px;">
                    {!! $textoDiagnostico !!}
                </td>
            </tr>
        </tbody>
    </table>

    {{-- TEXTOS DE CONCLUSÃO --}}
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoFecha'] !!}</p>
        <p>{!! $dadosRelatorio['textoRodape'] !!}</p>
    </div>

@endsection