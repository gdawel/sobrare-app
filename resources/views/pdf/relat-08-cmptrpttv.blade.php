@extends('pdf.layout')

@section('title', 'Relatório de Tendências de Repetições')

@section('content')
    @php
        // Função helper para as cores, como definido anteriormente
        function getDiagnosticClass($diagnosticText) {
            if (str_contains(strtolower($diagnosticText), 'leve')) return 'bg-status-leve';
            if (str_contains(strtolower($diagnosticText), 'atenção')) return 'bg-status-atencao';
            if (str_contains(strtolower($diagnosticText), 'requer')) return 'bg-status-requer';
            return '';
        }
    @endphp

    {{-- CORREÇÃO 1: CABEÇALHO PADRÃO ADICIONADO --}}
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

    <h2 class="mt-4 text-center">Resumo das tendências em minhas repetições:</h2>
    
    <table class="report-table">
        <thead>
            <tr>
                <th style="width: 25%;">Comportamentos de:</th>
                <th class="text-center" style="width: 5%;">%</th>
                <th style="width: 15%;">Típicos de</th>
                <th>Resumo das tendências em minhas repetições:</th>
            </tr>
        </thead>
        <tbody>
            {{-- SEÇÃO CM --}}
            @php $classCM = getDiagnosticClass($diagnosticoCM); @endphp
            <tr>
                <td rowspan="2" class="diagnostic-cell">
                    <div class="diagnosis {{ $classCM }}">{{ $diagnosticoCM }}</div>
                    {{-- CORREÇÃO 2: Usando number_format() para garantir que 0 seja exibido --}}
                    <div class="percentage">{{ number_format($percentCM, 0) }}%<br>CM</div>
                </td>
                <td class="text-center">{{ number_format($percentSistematizacao, 0) }}%</td>
                <td>Sistematização</td>
                <td>{!! $resultadoTeste[0]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[1]->textoResposta->textoResposta !!}</td>
            </tr>
            <tr>
                <td class="text-center">{{ number_format($percentRegulacao, 0) }}%</td>
                <td>Regulação</td>
                <td>{!! $resultadoTeste[2]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[3]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[4]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[5]->textoResposta->textoResposta !!}</td>
            </tr>

            {{-- SEÇÃO IM --}}
            @php $classIM = getDiagnosticClass($diagnosticoIM); @endphp
            <tr>
                <td rowspan="3" class="diagnostic-cell">
                    <div class="diagnosis {{ $classIM }}">{{ $diagnosticoIM }}</div>
                    <div class="percentage">{{ number_format($percentIM, 0) }}%<br>IM</div>
                </td>
                <td class="text-center">{{ number_format($percetInteresses, 0) }}%</td>
                <td>Interesses</td>
                <td>{!! $resultadoTeste[6]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[7]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[8]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[9]->textoResposta->textoResposta !!}</td>
            </tr>
            <tr>
                <td class="text-center">{{ number_format($percentAcumulacao, 0) }}%</td>
                <td>Acumulação</td>
                <td>{!! $resultadoTeste[10]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[11]->textoResposta->textoResposta !!}</td>
            </tr>
            <tr>
                <td class="text-center">{{ number_format($percentMesmice, 0) }}%</td>
                <td>Mesmice</td>
                <td>{!! $resultadoTeste[12]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[13]->textoResposta->textoResposta !!}</td>
            </tr>

            {{-- SEÇÃO RS --}}
            @php $classRS = getDiagnosticClass($diagnosticoRS); @endphp
            <tr>
                <td rowspan="2" class="diagnostic-cell">
                    <div class="diagnosis {{ $classRS }}">{{ $diagnosticoRS }}</div>
                    <div class="percentage">{{ number_format($percentRS, 0) }}%<br>RS</div>
                </td>
                <td class="text-center">{{ number_format($percentSensibilidade, 0) }}%</td>
                <td>Sensibilidade</td>
                <td>{!! $resultadoTeste[14]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[15]->textoResposta->textoResposta !!}</td>
            </tr>
            <tr>
                <td class="text-center">{{ number_format($percentRestricao, 0) }}%</td>
                <td>Restrição</td>
                <td>{!! $resultadoTeste[16]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[17]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[18]->textoResposta->textoResposta !!} <br> {!! $resultadoTeste[19]->textoResposta->textoResposta !!}</td>
            </tr>

            {{-- LINHA FINAL --}}
            <tr>
                <td></td>
                <td class="text-center font-bold">{{ number_format($percentSomaTendencia, 0) }}%</td>
                <td class="font-bold">de tendência na repetição de comportamentos</td>
                <td>
                    <p><strong>Observação:</strong> Os comportamentos repetitivos estão presentes no TEA. Também estão presentes no Transtorno Obsessivo-Compulsivo, no Transtorno de Personalidade Anancástica, na Doença de Parkinson e na Síndrome de Tourette. Em particular no TEA de Nível 1 (Síndrome de Asperger), se tornam discretos devido à aprendizagem social que ocorreu durante os anos de vida. Quanto maior for a idade, maior será o treino social e maior será a probabilidade de NÃO ser detectado. Verifique com seu/sua psicólogo(a), qual dos quadros é mais possível em suas respostas.</p>
                    <p class="mt-4"><strong>Legenda:</strong> CM = Comportamentos Motores e reguladores / IM = Insistência na mesmice / RS = Respostas Sensoriais</p>
                </td>
            </tr>
        </tbody>
    </table>
    
    {{-- ... (resto do seu relatório, como a seção de fontes) ... --}}
@endsection