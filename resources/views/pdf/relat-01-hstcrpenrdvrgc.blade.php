@extends('pdf.layout')

@section('title', 'Relatório de História do Corpo e Neurodivergências')

@section('content')
    {{-- CABEÇALHO COM LOGOS E TÍTULO --}}
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

    {{-- SEÇÃO: PERFIL SOCIODEMOGRÁFICO --}}
    <h2 class="mt-4">Perfil Sociodemográfico</h2>
    <p style="font-size: 10px; text-align: center; margin-top: -10px; margin-bottom: 15px;">
        Preenchido em: {{ $dadosRelatorio['dadosCliente']['created_at']->format('d-m-Y') }}
    </p>

    <table class="w-100">
        <tr>
            <td style="width: 25%;"><strong>Sexo Biológico:</strong><br>{{ $dadosRelatorio['sexoBiologico'] }}</td>
            <td style="width: 25%;"><strong>Gênero:</strong><br>{{ $dadosRelatorio['dadosCliente']['genero'] }}</td>
            <td style="width: 25%;"><strong>Etnia:</strong><br>{{ $dadosRelatorio['dadosCliente']['etnia'] }}</td>
            <td style="width: 25%;"><strong>Mão mais ágil:</strong><br>{{ $dadosRelatorio['dadosCliente']['maoMaisAgil'] }}</td>
        </tr>
        <tr style="margin-top: 10px;">
            <td><strong>Estado de Nascimento:</strong><br>{{ $dadosRelatorio['estadoNascimentoCliente'] }}</td>
            <td><strong>Cidade que Reside:</strong><br>{{ $dadosRelatorio['dadosCliente']['cidadeQueReside'] }}</td>
            <td><strong>Outros Idiomas:</strong><br>{{ $dadosRelatorio['dadosCliente']['outrosIdiomas'] }}</td>
            <td><strong>Grau escolar:</strong><br>{{ $dadosRelatorio['dadosCliente']['grauEscolar'] }}</td>
        </tr>
    </table>

    {{-- SEÇÃO: DIAGNÓSTICO PESSOAL E FAMILIAR --}}
    <h2 class="mt-4">Diagnóstico Pessoal e Familiar</h2>
    <p class="text-center" style="font-size: 10px; margin-top: -10px; margin-bottom: 15px;">Respostas sobre Saúde Mental, Habilidades na Infância e Histórico Familiar</p>

    <p class="font-bold">Você já foi diagnosticado formalmente em uma das áreas abaixo?</p>
    <table class="report-table">
        <thead>
            <tr>
                <th style="width: 75%;">Diagnóstico</th>
                <th class="text-center">Resposta</th>
            </tr>
        </thead>
        <tbody>
            @php
                // Função anônima para evitar repetição no código
                $formatResponse = function ($response) {
                    $response = strtolower($response);
                    if ($response === 'nao') return 'Não';
                    return ucfirst($response);
                };
            @endphp
            <tr><td>Déficit de atenção com ou sem hiperatividade</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['deficitAtencao']) }}</td></tr>
            <tr><td>Anorexia nervosa</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['anorexiaNervosa']) }}</td></tr>
            <tr><td>Transtorno de Ansiedade (por exemplo, Ansiedade Generalizada)</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['transtornoAnsiedade']) }}</td></tr>
            <tr><td>Autismo Nível 1 (Antiga Síndrome de Asperger)</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['autismoNivel1']) }}</td></tr>
            <tr><td>Transtorno Bipolar</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['transtornoBipolar']) }}</td></tr>
            <tr><td>Depressão</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['depressao']) }}</td></tr>
            <tr><td>Transtorno Histriônico</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['transtornoHistrionico']) }}</td></tr>
            <tr><td>Transtorno Intelectual (Dificuldade de Aprendizagem)</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['transtornoIntelectual']) }}</td></tr>
            <tr><td>Dificuldades de expressar nosso idioma</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['dificuldadeExpressar']) }}</td></tr>
            <tr><td>Transtorno Obsessivo Compulsivo (TOC)</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['toc']) }}</td></tr>
            <tr><td>Transtorno de Personalidade (Borderline, Narcisista, etc.)</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['transtornoDePersonalidade']) }}</td></tr>
            <tr><td>Fobias</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['fobias']) }}</td></tr>
            <tr><td>Transtorno de Esquizofrenia</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['esquizofrenia']) }}</td></tr>
            @if($dadosRelatorio['dadosCliente']['outroEspecificar'])
                <tr><td>Outro:</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['outroEspecificar']) }}</td></tr>
            @endif
        </tbody>
    </table>

    <p class="font-bold mt-4">Quando criança, você tinha alguma habilidade excepcional?</p>
    <table class="report-table">
        <thead>
            <tr>
                <th style="width: 75%;">Habilidade</th>
                <th class="text-center">Resposta</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>Hiperlexia (aprendeu a ler antes dos 3 anos)</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['hiperlexia']) }}</td></tr>
            <tr><td>Hipercalculia (habilidade matemática muito acima da idade)</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['hipercalculia']) }}</td></tr>
            <tr><td>Ouvido absoluto (musical)</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['ouvidoAbsoluto']) }}</td></tr>
            <tr><td>Talento para pintar / desenhar antes dos 4 anos</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['talentoPintar']) }}</td></tr>
            <tr><td>Faixa superdotada de QI para a idade</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['faixaSuperiorQI']) }}</td></tr>
        </tbody>
    </table>
    <p style="font-size: 9px; margin-top: 5px; font-style: italic;">Nota: A ocorrência de mais de uma excepcionalidade pode indicar dupla excepcionalidade (alta dotação em conjunto com outra característica neurodivergente).</p>

    <p class="font-bold mt-4">Histórico Familiar</p>
    <table class="report-table">
        <thead>
            <tr>
                <th style="width: 75%;">Pergunta</th>
                <th class="text-center">Resposta</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>Quantas irmãs biológicas você tem?</td><td class="text-center">{{ $dadosRelatorio['dadosCliente']['qtdIrmasBio'] }}</td></tr>
            <tr><td>Quantos irmãos biológicos você tem?</td><td class="text-center">{{ $dadosRelatorio['dadosCliente']['qtdIrmaosBio'] }}</td></tr>
            <tr><td>Quantos filhos(as) biológicos você tem?</td><td class="text-center">{{ $dadosRelatorio['dadosCliente']['qtdFilhosBio'] }}</td></tr>
            <tr><td>Algum membro da família nuclear (pai, mãe, irmãos) foi diagnosticado com TEA?</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['familiaNuclear']) }}</td></tr>
            <tr><td>Algum parente (avós, tios, primos) tem diagnóstico formal de neurodivergência?</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['diagnosticoParentes']) }}</td></tr>
            <tr><td>Você tem filhos(as) não biológicos sob seus cuidados?</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['filhosSobCuidados']) }}</td></tr>
            <tr><td>Algum descendente precisa de avaliação para neurodivergência?</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['descendentesPrecisamAvaliacao']) }}</td></tr>
            <tr><td>Algum de seus filhos(as) foi formalmente diagnosticado?</td><td class="text-center">{{ $formatResponse($dadosRelatorio['dadosCliente']['filhosComDiagnostico']) }}</td></tr>
            <tr><td>Qual é a sua ocupação?</td><td class="text-center">{{ $dadosRelatorio['dadosCliente']['ocupacaoPrincipal'] }}</td></tr>
        </tbody>
    </table>
    <p style="font-size: 9px; margin-top: 5px; font-weight: bold;">Adaptação e ampliação: Dr. George Barbosa CRP: 6/45 154</p>


    {{-- SEÇÃO: HISTÓRICO DO CORPO --}}
    <div style="page-break-before: always;"></div>
    <h2 class="mt-4">Histórico do Corpo e Correlações com as Neurodivergências</h2>
    <p class="text-center" style="font-size: 10px;">Este questionário contém uma série de patologias e ou sintomas que ocorrem com certa frequência. Para preenchê-lo basta você identificar com um "X" sua situação.</p>
    <p class="text-center" style="font-size: 9px; margin-bottom: 15px;">Adaptação e ampliação: Dr. George Barbosa CRP: 6/45 154 (Usado com permissão do autor original, Dr. Esdras. G. Vasconcelos do “IPSPP”)</p>

    <table class="report-table">
        <thead>
            <tr>
                <th style="width: 10%;">N.seq.</th>
                <th style="width: 65%;">Pergunta do teste</th>
                <th class="text-center">Resposta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                <tr style="page-break-inside: avoid;">
                    <td>{{ $item->pergunta->id }}</td>
                    <td>{{ $item->pergunta->enunciado }}</td>
                    <td class="text-center">{{ $item->opcaoresposta->textoResposta }}</td>
                </tr>
                @if ($item->comentariosCliente)
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

@endsection