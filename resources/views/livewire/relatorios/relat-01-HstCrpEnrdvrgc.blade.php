<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'SOBRARE | Neurodiversidade' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        {{-- CSS para otimizar a impressão e geração de PDF --}}
        <style>
            @media print {
                body, .printable-content {
                    margin: 0 !important;
                    padding: 0 !important;
                }
                .main-container {
                    max-width: none !important;
                    margin: 0 !important;
                    padding: 0 !important;
                }
                .card-container {
                    box-shadow: none !important;
                    border: none !important; /* Remove a moldura/borda */
                }
                @page {
                    size: A4;
                    margin: 1cm; /* Margens da página do PDF reduzidas */
                }
            }
        </style>
    </head>

    <body class="bg-white dark:bg-slate-700">

    <main>
<div class="printable-content">
  <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-4 my-4 sm:my-10 main-container">
  <div class="sm:w-11/12 lg:w-3/4 mx-auto">
    <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl dark:bg-neutral-800 card-container">
      <div class="flex justify-between">
        <div>
            <img class="h-12" src="{{ asset('storage/sobrare_logo_1.jpg') }}">

          <h1 class="mt-2 pt-16 text-xl md:text-xl font-semibold text-blue-600 dark:text-white">
            {{ $dadosRelatorio['tituloTeste'] }}
            </h1>
        </div>
        <div class="text-end">
            <img class="h-12" src="{{ asset('storage/logo_neudiv_1.jpg') }}">
          <h2 class="text-base md:text-lg font-semibold text-gray-800 dark:text-neutral-200">NEURODIVERSIDADE</h2>
          <span class="mt-1 block font-semibold text-gray-800 dark:text-neutral-500">
            Cod. interno: {{ $dadosRelatorio['orders_id'] }}/{{ $dadosRelatorio['idadeCliente'] }}-{{ $dadosRelatorio['estadoNascimentoCliente'] }}</span>
        </div>
        </div>
      <div class="mt-8 grid sm:grid-cols-2 gap-3">
        <div>
          <h3 class="text-sm font-semibold text-gray-800 dark:text-neutral-200">Para:</h3>
          <h3 class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $dadosRelatorio['nomeCliente'] }}</h3>
          <address class="text-sm mt-2 not-italic font-semibold text-gray-800 dark:text-neutral-500">
            Idade: {{ $dadosRelatorio['idadeCliente'] }}<br>
          </address>
        </div>
        <div class="sm:text-end space-y-2">
          <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="text-sm col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Emitido em:</dt>
              <dd class="text-sm col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ $dadosRelatorio['dataEmissao'] }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="text-sm col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Respondido em:</dt>
              <dd class="text-sm col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ $dadosRelatorio['dataFinalTeste'] }}</dd>
            </dl>
          </div>
          </div>
        </div>
      {{-- linha de separação --}}
      <div class="pt-8 mt-8 hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
        {{-- Subtítulo da Seção --}}
      <div class="text-xl text-center font-semibold text-gray-800">Perfil Sociodemográfico</div>
      <div class="text-sm text-center font-semibold text-gray-800">
                      Preenchido em: {{ $dadosRelatorio['dadosCliente']['created_at']->format('d-m-Y') }}</div>
      {{-- linha de separação --}}
      <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>

      <div class="max-w-[85rem] px-2 py-4 sm:px-6 lg:px-4 lg:py-6 ">
      <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-6">
          <div>
            <div>
              <h3 class="text-sm block font-bold text-gray-800 dark:text-white">Sexo Biológico</h3>
              <p class="text-sm text-gray-900 dark:text-neutral-400">{{ $dadosRelatorio['sexoBiologico'] }}</p>
            </div>
          </div>
          <div>
            <div>
              <h3 class="text-sm block font-bold text-gray-800 dark:text-white">Gênero</h3>
              <p class="text-sm text-gray-900 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['genero'] }}</p>
            </div>
          </div>
          <div>
            <div>
              <h3 class="text-sm block font-bold text-gray-800 dark:text-white">Etnia</h3>
              <p class="text-sm text-gray-900 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['etnia'] }}</p>
            </div>
          </div>
          <div>
            <div>
              <h3 class="text-sm block font-bold text-gray-800 dark:text-white">Mão mais ágil</h3>
              <p class="text-sm text-gray-900 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['maoMaisAgil'] }}</p>
            </div>
          </div>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-6 mt-6">
          <div>
            <div>
              <h3 class="text-sm block font-bold text-gray-800 dark:text-white">Estado de Nascimento</h3>
              <p class="text-sm text-gray-900 dark:text-neutral-400">{{ $dadosRelatorio['estadoNascimentoCliente'] }}</p>
            </div>
          </div>
          <div>
            <div>
              <h3 class="text-sm block font-bold text-gray-800 dark:text-white">Cidade que Reside</h3>
              <p class="text-sm text-gray-900 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['cidadeQueReside'] }}</p>
            </div>
          </div>
          <div>
            <div>
              <h3 class="text-sm block font-bold text-gray-800 dark:text-white">Outros Idiomas</h3>
              <p class="text-sm text-gray-900 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['outrosIdiomas'] }}</p>
            </div>
          </div>
          <div>
            <div>
              <h3 class="text-sm block font-bold text-gray-800 dark:text-white">Grau escolar</h3>
              <p class="text-sm text-gray-900 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['grauEscolar'] }}</p>
            </div>
          </div>
      </div>
    </div>
<div class="pt-8 mt-8 hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
        {{-- Subtítulo da Seção --}}
      <div class="text-xl text-center font-semibold text-gray-800">
          Diagnóstico Pessoal e Familiar
      </div>
      <div class="text-sm text-center font-semibold text-gray-500 dark:text-gray-400">
          Respostas sobre Saúde Mental, Habilidades na Infância e Histórico Familiar
      </div>
        {{-- linha de separação --}}
      <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700 mb-6"></div>

      <div class="mt-4">
        <p class="text-sm font-semibold text-gray-600 dark:text-gray-300 mb-2">Você já foi diagnosticado formalmente em uma das áreas abaixo?</p>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-sm font-bold text-slate-700 uppercase bg-slate-200 dark:bg-slate-700 dark:text-slate-300">
                <tr>
                    <th scope="col" class="px-6 py-3">Diagnóstico</th>
                    <th scope="col" class="px-6 py-3 text-center w-1/4">Resposta</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Déficit de atenção com ou sem hiperatividade</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['deficitAtencao'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Anorexia nervosa</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['anorexiaNervosa'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Transtorno de Ansiedade (por exemplo, Ansiedade Generalizada)</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['transtornoAnsiedade'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Autismo Nível 1 (Antiga Síndrome de Asperger)</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['autismoNivel1'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Transtorno Bipolar</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['transtornoBipolar'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Depressão</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['depressao'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Transtorno Histriônico</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['transtornoHistrionico'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Transtorno Intelectual (Dificuldade de Aprendizagem)</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['transtornoIntelectual'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Dificuldades de expressar nosso idioma</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['dificuldadeExpressar'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Transtorno Obsessivo Compulsivo (TOC)</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['toc'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Transtorno de Personalidade (Borderline, Narcisista, etc.)</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['transtornoDePersonalidade'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Fobias</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['fobias'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Transtorno de Esquizofrenia</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['esquizofrenia'] }}</td></tr>
                @if($dadosRelatorio['dadosCliente']['outroEspecificar'])
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Outro:</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['outroEspecificar'] }}</td></tr>
                @endif
            </tbody>
        </table>
      </div>

      <div class="mt-8">
        <p class="text-sm font-semibold text-gray-600 dark:text-gray-300 mb-2">Quando criança, você tinha alguma habilidade excepcional?</p>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-sm font-bold text-slate-700 uppercase bg-slate-200 dark:bg-slate-700 dark:text-slate-300">
                <tr>
                    <th scope="col" class="px-6 py-3">Habilidade</th>
                    <th scope="col" class="px-6 py-3 text-center w-1/4">Resposta</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Hiperlexia (aprendeu a ler antes dos 3 anos)</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['hiperlexia'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Hipercalculia (habilidade matemática muito acima da idade)</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['hipercalculia'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Ouvido absoluto (musical)</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['ouvidoAbsoluto'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Talento para pintar / desenhar antes dos 4 anos</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['talentoPintar'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Faixa superdotada de QI para a idade</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['faixaSuperiorQI'] }}</td></tr>
            </tbody>
        </table>
        <div class="mt-2 px-1 italic text-xs text-left font-semibold text-gray-500 dark:text-gray-400">
            Nota: A ocorrência de mais de uma excepcionalidade pode indicar dupla excepcionalidade (alta dotação em conjunto com outra característica neurodivergente).
        </div>
      </div>

      <div class="mt-8">
        <p class="text-sm font-semibold text-gray-600 dark:text-gray-300 mb-2">Histórico Familiar</p>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-sm font-bold text-slate-700 uppercase bg-slate-200 dark:bg-slate-700 dark:text-slate-300">
                <tr>
                    <th scope="col" class="px-6 py-3">Pergunta</th>
                    <th scope="col" class="px-6 py-3 text-center w-1/4">Resposta</th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Quantas irmãs biológicas você tem?</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['qtdIrmasBio'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Quantos irmãos biológicos você tem?</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['qtdIrmaosBio'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Quantos filhos(as) biológicos você tem?</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['qtdFilhosBio'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Algum membro da família nuclear (pai, mãe, irmãos) foi diagnosticado com TEA?</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['familiaNuclear'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Algum parente (avós, tios, primos) tem diagnóstico formal de neurodivergência?</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['diagnosticoParentes'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Você tem filhos(as) não biológicos sob seus cuidados?</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['filhosSobCuidados'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Algum descendente precisa de avaliação para neurodivergência?</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['descendentesPrecisamAvaliacao'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Algum de seus filhos(as) foi formalmente diagnosticado?</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['filhosComDiagnostico'] }}</td></tr>
                <tr class="odd:bg-white border-b odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700"><th scope="row" class="px-6 py-2 font-semibold text-gray-800 text-pretty dark:text-white">Qual é a sua ocupação?</th><td class="px-6 py-2 text-center">{{ $dadosRelatorio['dadosCliente']['ocupacaoPrincipal'] }}</td></tr>
            </tbody>
        </table>
        <div class="mt-4 text-xs text-left font-bold text-gray-500 dark:text-gray-400">
          Adaptação e ampliação: Dr. George Barbosa CRP: 6/45 154
        </div>
      </div>

      <div class="mt-6 pt-8 border-t border-gray-200 dark:border-neutral-700">
        <div class="text-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">HISTÓRICO DO CORPO E CORRELAÇÕES COM AS NEURODIVERGÊNCIAS</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Este questionário contém uma série de patologias e ou sintomas que ocorrem com certa frequência. Para preenchê-lo basta você identificar com um "X" sua situação.</p>
            <p class="text-xs text-gray-500 dark:text-gray-500 mt-2">Adaptação e ampliação: Dr. George Barbosa CRP: 6/45 154 (Usado com permissão do autor original, Dr. Esdras. G. Vasconcelos do “IPSPP”)</p>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" style="page-break-inside: auto;">
                <thead class="text-sm font-bold text-slate-700 uppercase bg-slate-200 dark:bg-slate-700 dark:text-slate-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-12">N.seq.</th>
                        <th scope="col" class="px-6 py-3">Pergunta do teste</th>
                        <th scope="col" class="px-6 py-3 w-1/4 text-center">Resposta</th>
                    </tr>
                </thead>
                @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                <tbody class="{{ $loop->odd ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800' }} border-b dark:border-gray-700" style="page-break-inside: avoid;">
                    <tr>
                        <th scope="row" class="px-6 py-4 font-semibold text-gray-800 dark:text-white align-top">{{ $item->pergunta->id }}</th>
                        <td class="px-6 py-4 font-semibold text-gray-800 dark:text-white">{{ $item->pergunta->enunciado }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-800 dark:text-white text-center align-top">{{ $item->opcaoresposta->textoResposta }}</td>
                    </tr>
                    @if ($item->comentariosCliente)
                    <tr>
                        <td></td>
                        <td colspan="2" class="px-6 pt-0 pb-4">
                            <div class="text-xs text-gray-600 dark:text-gray-400">
                                <span class="font-bold">Comentário:</span>
                                <span class="italic">{{ $item->comentariosCliente }}</span>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
                @endforeach
            </table>
        </div>
      </div>
      <p class="mt-8 text-sm font-semibold text-gray-800 dark:text-neutral-500">© SOBRARE - Todos os direitos reservados.</p>
    </div>
    </div>
  </div>
</div>
</main>

        @livewireScripts
    </body>
</html>