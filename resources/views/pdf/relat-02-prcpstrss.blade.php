@extends('pdf.layout')

@section('title', 'Relatório de Percepção de Estresse')

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
    <table class="w-100" style="margin-top: 20px;">
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

    {{-- TABELA DE RESULTADOS --}}
    <h2 class="mt-4">Respostas do Questionário</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th style="width: 10%;">N.seq.</th>
                <th style="width: 60%;">Pergunta do teste</th>
                <th>Resposta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                <tr>
                    <td>{{ $item->pergunta->sequencia }}</td>
                    <td>{{ $item->pergunta->enunciado }}</td>
                    <td>{{ $item->opcaoresposta->textoResposta }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- RESULTADO E GRÁFICO --}}
    <h2 class="mt-4">Resultado Final</h2>
    <p>O gráfico abaixo representa o seu nível de estresse percebido em uma escala de 0 a 6, onde valores mais altos indicam uma maior percepção de estresse.</p>
    
    <div class="text-center mt-4">
        <img src="{{ $chartImageUrl }}" alt="Gráfico de Resultado de Estresse">
    </div>

    {{-- TEXTOS DE CONCLUSÃO --}}
    <div class="mt-4">
        <p class="text-justify">{!! $dadosRelatorio['textoFecha'] !!}</p>
        <p class="text-justify">{!! $dadosRelatorio['textoRodape'] !!}</p>
    </div>

@endsection