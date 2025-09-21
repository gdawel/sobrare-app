@extends('pdf.layout')

@section('title', 'Relatório: Como o Cérebro Funciona')

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

    {{-- TABELA DE RESPOSTAS (COM A CORREÇÃO) --}}
    <h2 class="mt-4">Respostas do Questionário</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th style="width: 10%;">N.seq.</th>
                <th style="width: 60%;">Pergunta do teste</th>
                <th>Resposta</th>
                {{-- Coluna de Comentários Removida Daqui --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                <tr style="page-break-inside: avoid;">
                    <td>{{ $item->pergunta->sequencia }}</td>
                    <td>{{ $item->pergunta->enunciado }}</td>
                    <td>{{ $item->opcaoresposta->textoResposta }}</td>
                    {{-- Célula de Comentário Removida Daqui --}}
                </tr>
                {{-- Nova linha condicional para o comentário --}}
                @if (!empty($item->comentariosCliente))
                    <tr style="page-break-inside: avoid;">
                        <td></td> {{-- Célula vazia para alinhar --}}
                        <td colspan="2"> {{-- Ocupa as 2 colunas restantes --}}
                            <div class="comment">
                                <strong>Comentário:</strong> {{ $item->comentariosCliente }}
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    {{-- QUEBRA DE PÁGINA PARA O GRÁFICO E RESULTADOS --}}
    <div style="page-break-before: always;"></div>

    <h2 class="mt-4">Resultados e Gráfico</h2>

    {{-- TABELA DE PONTUAÇÃO --}}
    <table class="report-table">
        <thead>
            <tr>
                <th>Tipo de Cérebro</th>
                <th class="text-right">Pontuação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cérebro Social (Tipo QE)</td>
                <td class="text-right">{{ number_format($cerebroSocial, 2, ',') }}</td>
            </tr>
            <tr>
                <td>Cérebro Mesclado (Tipo B)</td>
                <td class="text-right">{{ number_format($cerebroMesclado, 2, ',') }}</td>
            </tr>
            <tr>
                <td>Cérebro Sistematizador (Tipo QS)</td>
                <td class="text-right">{{ number_format($cerebroSistematizador, 2, ',') }}</td>
            </tr>
        </tbody>
    </table>
    
    {{-- GRÁFICO GERADO COMO IMAGEM --}}
    @if ($chartImageUrl)
        <div class="text-center mt-4">
            <img src="{{ $chartImageUrl }}" style="width: 80%; height: auto; margin: 0 auto;" alt="Gráfico Como Funciona Meu Cérebro">
        </div>
    @endif
    
    {{-- TEXTOS DE CONCLUSÃO --}}
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoFecha'] !!}</p>
        <p>{!! $dadosRelatorio['textoRodape'] !!}</p>
    </div>

@endsection