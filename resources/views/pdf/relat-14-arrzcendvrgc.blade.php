@extends('pdf.layout')

@section('title', 'Relatório de Autorrealização e Neurodivergência')

@section('content')
    {{-- 1. CABEÇALHO ADICIONADO --}}
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
    
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoIntro'] !!}</p>
    </div>

    {{-- GRÁFICO 1 --}}
    @if ($chartImageUrl1)
        <div class="text-center mt-4">
            <img src="{{ $chartImageUrl1 }}" style="width: 100%; height: auto;" alt="Gráfico de Aspectos Corrosivos">
        </div>
    @endif
    
    {{-- 3. TEXTO DE FECHAMENTO MOVIDO PARA CÁ --}}
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoFecha'] !!}</p>
    </div>

    {{-- QUEBRA DE PÁGINA --}}
    {{-- <div style="page-break-before: always;"></div> --}}

    {{-- GRÁFICO 2 --}}
    @if ($chartImageUrl2)
        <div class="text-center mt-4">
            <img src="{{ $chartImageUrl2 }}" style="width: 100%; height: auto;" alt="Gráfico de Disciplinas Favoráveis">
        </div>
    @endif

    {{-- TEXTO RODAPÉ --}}
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoRodape'] !!}</p>
    </div>

@endsection