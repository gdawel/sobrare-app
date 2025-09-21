@extends('pdf.layout')

@section('title', 'Relatório de Ordenação de Assuntos')

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

    {{-- TABELA DE RESPOSTAS --}}
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
                <tr style="page-break-inside: avoid;">
                    <td>{{ $item->pergunta->sequencia }}</td>
                    <td>{{ $item->pergunta->enunciado }}</td>
                    <td>{{ $item->opcaoresposta->textoResposta }}</td>
                </tr>
                @if (!empty($item->comentariosCliente))
                    <tr style="page-break-inside: avoid;">
                        <td></td>
                        <td colspan="2">
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

    <h2 class="mt-4">Pontuação e Gráfico de Relevância</h2>

    {{-- TABELA DE PONTUAÇÃO --}}
    <table class="report-table">
        <thead>
            <tr>
                <th>Assunto</th>
                <th class="text-right">Pontuação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>A minha comunicação</td>
                <td class="text-right">{{ number_format($comunicacao, 2, ',') }}</td>
            </tr>
            <tr>
                <td>O tipo do meu pensamento</td>
                <td class="text-right">{{ number_format($pensamento, 2, ',') }}</td>
            </tr>
            <tr>
                <td>Meu processo de atenção</td>
                <td class="text-right">{{ number_format($atencao, 2, ',') }}</td>
            </tr>
            <tr>
                <td>Minha tensão muscular</td>
                <td class="text-right">{{ number_format($tensao, 2, ',') }}</td>
            </tr>
            <tr>
                <td>Meu desempenho social</td>
                <td class="text-right">{{ number_format($social, 2, ',') }}</td>
            </tr>
            <tr>
                <td>Meus estados emocionais</td>
                <td class="text-right">{{ number_format($emocional, 2, ',') }}</td>
            </tr>
            <tr>
                <td>Condições mentais e físicas</td>
                <td class="text-right">{{ number_format($mental, 2, ',') }}</td>
            </tr>
             <tr>
                <td>Minha sexualidade e lazer</td>
                <td class="text-right">{{ number_format($sexualidade, 2, ',') }}</td>
            </tr>
        </tbody>
    </table>
    
    {{-- GRÁFICO GERADO COMO IMAGEM --}}
    @if ($chartImageUrl)
        <div class="text-center mt-4">
            <img src="{{ $chartImageUrl }}" style="width: 100%; height: auto;" alt="Gráfico de Relevância por Assunto">
        </div>
    @endif
    
    {{-- TEXTOS DE CONCLUSÃO --}}
    <div class="mt-4">
        <p>{!! $dadosRelatorio['textoFecha'] !!}</p>
        <p>{!! $dadosRelatorio['textoRodape'] !!}</p>
    </div>

@endsection