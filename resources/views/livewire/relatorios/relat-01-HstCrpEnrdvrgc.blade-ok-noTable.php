
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'SOBRARE | Neurodiversidade' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="bg-white dark:bg-slate-700">
 
        <main>
<!-- Invoice -->
<div>
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
  <div class="sm:w-11/12 lg:w-3/4 mx-auto">
    <!-- Card -->
    <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl dark:bg-neutral-800">
      <!-- Grid -->
      <div class="flex justify-between">
        <div>
            <img class="h-16" src="{{ asset('storage/sobrare_logo_1.jpg') }}">
          {{-- <svg class="size-10" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 26V13C1 6.37258 6.37258 1 13 1C19.6274 1 25 6.37258 25 13C25 19.6274 19.6274 25 13 25H12" class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2"/>
            <path d="M5 26V13.16C5 8.65336 8.58172 5 13 5C17.4183 5 21 8.65336 21 13.16C21 17.6666 17.4183 21.32 13 21.32H12" class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2"/>
            <circle cx="13" cy="13.0214" r="5" fill="currentColor" class="fill-blue-600 dark:fill-white"/>
          </svg> --}}

          <h1 class="mt-2 pt-16 text-xl md:text-xl font-semibold text-blue-600 dark:text-white">
            {{ $dadosRelatorio['tituloTeste'] }}
            </h1>
        </div>
        <!-- Col -->

        <div class="text-end">
            <img class="h-16" src="{{ asset('storage/logo_neudiv_1.jpg') }}">
          <h2 class="text-base md:text-xl font-semibold text-gray-800 dark:text-neutral-200">NEURODIVERSIDADE</h2>
          <span class="mt-1 block text-gray-500 dark:text-neutral-500">
            Cod. interno: {{ $dadosRelatorio['orders_id'] }}/{{ $dadosRelatorio['idadeCliente'] }}-{{ $dadosRelatorio['estadoNascimentoCliente'] }}</span>

          {{-- <address class="mt-4 not-italic text-gray-800 dark:text-neutral-200">
            45 Roker Terrace<br>
            Latheronwheel<br>
            KW5 8NW, London<br>
            United Kingdom<br>
          </address> --}}
        </div>
        <!-- Col -->
      </div>
      <!-- End Grid -->

      <!-- Grid -->
      <div class="mt-8 grid sm:grid-cols-2 gap-3">
        <div>
          <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Para:</h3>
          <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">{{ $dadosRelatorio['nomeCliente'] }}</h3>
          <address class="mt-2 not-italic text-gray-500 dark:text-neutral-500">
            Idade: {{ $dadosRelatorio['idadeCliente'] }}<br>
          {{--   Breannabury, OR 45801,<br>
            United States<br> --}}
          </address>
        </div>
        <!-- Col -->

        <div class="sm:text-end space-y-2">
          <!-- Grid -->
          <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Emitido em:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">{{ $dadosRelatorio['dataEmissao'] }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Respondido em:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">{{ $dadosRelatorio['dataFinalTeste'] }}</dd>
            </dl>
          </div>
          <!-- End Grid -->
        </div>
        <!-- Col -->
      </div>
      <!-- End Grid -->

      {{-- linha de separação --}}
      <div class="pt-8 hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
        {{-- Subtítulo da Seção --}}
      <div class="text-2xl text-center font-semibold text-gray-400">Perfil Sociodemográfico</div> 
      <div class="text-sm text-center font-semibold text-gray-500">
                    Preenchido em: {{ $dadosRelatorio['dadosCliente']['created_at']->format('d-m-Y') }}</div> 
      {{-- linha de separação --}}
      <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>

      <!-- Icon Blocks -->
      <div class="max-w-[85rem] px-2 py-4 sm:px-6 lg:px-4 lg:py-6 ">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-6">
          <!-- Card -->
          {{-- <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#"> --}}
            
            <div>
              <div>
                <h3 class="block font-bold text-gray-800 dark:text-white">Sexo Biológico</h3>
                <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['sexoBiologico'] }}</p>
              </div>
              
            </div>
          {{-- </a> --}}
          <!-- End Card -->

          <!-- Card -->
          {{-- <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#"> --}}
          
            <div>
              <div>
                <h3 class="block font-bold text-gray-800 dark:text-white">Gênero</h3>
                <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['genero'] }}</p>
              </div>
              
            </div>
          {{-- </a> --}}
          <!-- End Card -->

          <!-- Card -->
          {{-- <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#"> --}}
            
            <div>
              <div>
                <h3 class="block font-bold text-gray-800 dark:text-white">Etnia</h3>
                <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['etnia'] }}</p>
              </div>
            
            </div>
          {{-- </a> --}}
          <!-- End Card -->

          <!-- Card -->
          {{-- <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#"> --}}
            
            <div>
              <div>
                <h3 class="block font-bold text-gray-800 dark:text-white">Mão mais ágil</h3>
                <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['maoMaisAgil'] }}</p>
              </div>
              
            </div>
          {{-- </a> --}}
          <!-- End Card -->
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-6">
          <!-- Card -->
          {{-- <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#"> --}}
            
            <div>
              <div>
                <h3 class="block font-bold text-gray-800 dark:text-white">Estado de Nascimento</h3>
                <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['estadoNascimentoCliente'] }}</p>
              </div>
              
            </div>
          {{-- </a> --}}
          <!-- End Card -->

          <!-- Card -->
          {{-- <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#"> --}}
          
            <div>
              <div>
                <h3 class="block font-bold text-gray-800 dark:text-white">Cidade que Reside</h3>
                <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['cidadeQueReside'] }}</p>
              </div>
              
            </div>
        {{--  </a> --}}
          <!-- End Card -->

          <!-- Card -->
          {{-- <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#"> --}}
            
            <div>
              <div>
                <h3 class="block font-bold text-gray-800 dark:text-white">Outros Idiomas</h3>
                <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['outrosIdiomas'] }}</p>
              </div>
            
            </div>
          {{-- </a> --}}
          <!-- End Card -->

          <!-- Card -->
          {{-- <a class="group flex gap-y-6 size-full hover:bg-gray-100 focus:outline-none focus:bg-gray-100 rounded-lg p-5 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#"> --}}
            
            <div>
              <div>
                <h3 class="block font-bold text-gray-800 dark:text-white">Grau escolar</h3>
                <p class="text-gray-600 dark:text-neutral-400">{{ $dadosRelatorio['dadosCliente']['grauEscolar'] }}</p>
              </div>
              
            </div>
          {{-- </a> --}}
          <!-- End Card -->
        </div>
      </div>
      <!-- End Icon Blocks -->

      <div class="pt-8 hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
              {{-- Subtítulo da Seção --}}
            <div class="text-2xl text-center font-semibold text-gray-400">
              Respostas sobre o Diagnostico Pessoal e Familiar quanto a Saúde Mental
            </div>
            <div class="text-sm text-center font-semibold text-gray-500">
                          Você já foi diagnosticado formalmente em uma das áreas abaixo?</div>  
            
              {{-- linha de separação --}}
            <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>

            <div class="mt-6">
              <div class="border border-gray-200 p-6 rounded-lg space-y-6 dark:border-neutral-700">
                <div class="grid grid-cols-12 ">
                  <div class="col-span-6 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</div>
                  
                  <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Resposta</div>
                  <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"> </div>
                </div>

                <div class=" border-b border-gray-200 dark:border-neutral-700"></div>
            <div class="grid grid-cols-12 ">
              
                <div class="text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Déficit de atenção com ou sem hiperatividade</div>
                <div class="text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['deficitAtencao'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Anorexia nervosa</div>
                <div class="pt-2 pr-1 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['anorexiaNervosa'] }}</div>
                
                <div class="pt-2 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Transtorno de Ansiedade (por exemplo, Ansiedade Generalizada)</div>
                <div class="pt-2 pr-1 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['transtornoAnsiedade'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Autismo Nível 1 (Antiga Síndrome de Asperger)</div>
                <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['autismoNivel1'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Transtorno Bipolar ( Alternância entre episódios de euforismo, exaltação e estados de tristeza, depressivos. A alternância, por vezes, pode ser semanais, trimestrais, ou em períodos maiores.</div>
                <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['transtornoBipolar'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Depressão</div>
                <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['depressao'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Transtorno Histriônico - Ampliar os feitos e realizações pessoais. Agir de modo sedutor(a) ou provocativa(o) ou manipuladora(or). Usar a aparência física como uma vitrine. Agir e atuar de modo inapropriado e todas estas possibilidades usadas como estratégia para  chamar a atenção ou vencer as pessoas pela argumentação.</div>
                <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['transtornoHistrionico'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Transtorno Intelectual (por exemplo, Dificuldade de Aprendizagem)</div>
                <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['transtornoIntelectual'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Atraso, déficit ou dificuldades de expressar nosso idioma (por exemplo, certas dificuldades na fala ou comunicação, como entender predominantemente o literal do que lhe é dito, dificuldades com o uso de gírias, voz monótona (sem modulações), fala demasiada formal ou refinada e até com termos técnicos - sem ser profissional da área técnica.</div>
                <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['dificuldadeExpressar'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Transtorno Obsessivo Compulsivo (TOC)</div>
                <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['toc'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Transtorno de Personalidade do tipo Borderline, Narcisista, Esquizotípico, Evitativo ou Psicótico</div>
                <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['transtornoDePersonalidade'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Fobias</div>
                <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['fobias'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Transtorno de Esquizofrenia</div>
                <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['esquizofrenia'] }}</div>

                <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                    Outro (por favor especifique):</div>
                <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                    {{ $dadosRelatorio['dadosCliente']['outroEspecificar'] }}</div>
              </div>

                {{-- linha de separação --}}
                <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
                <div class="text-xl text-center font-semibold text-gray-400">
                  A pergunta formulada para os ítens abaixo foi: "Quando criança, você tinha alguma habilidade excepcional (muito além do normal) em algum destes talentos?
                </div>
                <div class="text-sm text-center font-semibold text-gray-500">
                  Você respondeu Sim ou Não (Branco para não responder) se você tinha alguma habilidade muito além do normal em uma das áreas abaixo.</div>  
            
                {{-- linha de separação --}}
                <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
                <div class="grid grid-cols-12 ">
                  <div class="col-span-6 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</div>
                  
                  <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Resposta</div>
                  <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"> </div>
                </div>

                <div class=" border-b border-gray-200 dark:border-neutral-700"></div>
                    <div class="grid grid-cols-12 ">
                      <div class=" pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Hiperlexia (aprendeu a ler antes dos 3 anos de idade)</div>
                      <div class=" text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['hiperlexia'] }}</div>

                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Hipercalculia (antes dos 4 anos com habilidade em matemática significativamente acima da expectativa de idade - cálculos / lógica /astronomia / geometria)</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['hipercalculia'] }}</div>

                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Ouvido absoluto (musical)</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['ouvidoAbsoluto'] }}</div>

                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Talento para pintar / desenhar antes dos 04 anos</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['talentoPintar'] }}</div>

                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Faixa superdotada de QI para a idade</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['faixaSuperiorQI'] }}</div>
                      </div>

                  <div class="text-sm text-left font-semibold text-gray-500">
                  - Note que mais de uma excepcionalidade, implica em ter uma alta dotação de algum talento ou aptidão, por ex., matemática (cálculos lógicos), artes (pintura), música (tocar), prática ou atividades físicas (contorcionismo / evoluções), em conjunto com outra ou outras característica(s) em neurodivergência (como, TDAH, Dislexia, Discalculia, TEA, Sensibilidades exacerbadas (sensorial), Linguagem (por exemplo, a interpretação literal do que escuta ou fala [literalismo]). É comum se constatar nestes quadros, que o desenvolvimento emocional, intelectual ou psicológico acontece em tempos ou fases diferentes ou não concomitantes - tal situação é conhecida como assincronia no desenvolvimento). Comumente também se chama de dupla excepcionalidade e não se restringe a apenas duas ocorrências, pode-se encontrar mais de duas.</div>  
            
                {{-- linha de separação --}}
                <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
                <div class="grid grid-cols-12 ">
                  <div class="col-span-6 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</div>
                  
                  <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Resposta</div>
                  <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"> </div>
                </div>
                <div class=" border-b border-gray-200 dark:border-neutral-700"></div>
                    <div class="grid grid-cols-12 ">
                      <div class=" pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Quantas irmãs biológicas você tem?</div>
                      <div class=" text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['qtdIrmasBio'] }}</div>

                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Quantos irmãos biológicos você tem?</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['qtdIrmaosBio'] }}</div>
                      
                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Quantos filhos e filhas biológicos você tem? (Trás a carga genética sua ou do[a] parceiro[a] em gestações assistidas)</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['qtdFilhosBio'] }}</div>

                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Algum membro da sua família nuclear (pai, mãe, irmãos/irmãs) foi diagnosticado com TEA (Espectro do autismo)?</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['familiaNuclear'] }}</div>

                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Algum de seus avós, tios(as) ou primos(as), tem um diagnóstico formal de neurodivergência como Hipersensibilidade sensorial, autismo, TDAH, Dislexia etc.? E, em caso afirmativo, quantos?</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['diagnosticoParentes'] }}</div>

                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Você tem filhos e filhas não biológicos sob seus cuidados?</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['filhosSobCuidados'] }}</div>

                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Algum destes seus filhos ou filhas / netos "deve ser" encaminhado para uma avaliação de diagnóstico de neurodivergência (Hipersensibilidade, autismo, TDAH, TEA, Dislexia etc.) e, em caso afirmativo, quantos?</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['descendentesPrecisamAvaliacao'] }}</div>

                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Algum de seus filhos/ filhas foi formalmente diagnosticado em neurodivergência por um profissional (Hipersensibilidade sensorial, TDAH, TEA, Dislexia e etc.)? Em caso afirmativo, quantos?</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['filhosComDiagnostico'] }}</div>

                      <div class="pt-2 pr-1 text-sm col-span-6 block font-bold text-gray-800 dark:text-white">
                        Qual é a sua ocupação (ou ocupação passada se aposentado ou atualmente desempregado)?</div>
                      <div class="pt-2 text-sm col-span-3 text-gray-600 dark:text-neutral-400">
                        {{ $dadosRelatorio['dadosCliente']['ocupacaoPrincipal'] }}</div>
                      </div>
                      </div>

                  <div class="text-sm text-left font-bold text-gray-500">
                  Adaptação e ampliação: Dr. George Barbosa CRP: 6/45 154 				
      </div>  
      
                
      </div>
        
    </div>
      
      
      <!-- Table - Respostas ao Questionário Histórico -->
      <div class="mt-6">
        <div class="border border-gray-200 p-6 rounded-lg space-y-6 dark:border-neutral-700">
           {{-- Subtítulo da Seção --}}
          <div class="text-2xl text-center font-semibold text-gray-400">
            HISTÓRICO DO CORPO E CORRELAÇÕES COM AS NEURODIVERGÊNCIAS
          </div>
          <div class="text-sm text-center font-semibold text-gray-500">
            Este questionário contém uma série de patologias e ou sintomas que ocorrem com certa frequência. Para preenchê-lo basta você identificar com um "X" sua situação.</div> 
          <div class="text-sm text-center font-semibold text-gray-500">
            Adaptação e ampliação: Dr. George Barbosa CRP: 6/45 154 (Usado com permissão do autor original)</div>
          <div class="text-sm text-center font-semibold text-gray-500">
            O questionário original com 38 itens foi estruturado pelo Dr. Esdras. G. Vasconcelos do “IPSPP” visando identificar as condições do adoecimento. A partir da permissão do autor original organizei as ampliações necessárias para relacionar com os tópicos das neurodivergências.</div>   
          
        {{-- linha de separação --}}
        <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
            <div class="grid grid-cols-12 ">
              <div class="text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">N. Seq.</div>
              <div class="col-span-5 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</div>
              <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Resposta</div>
              <div class="col-span-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Comentários do Cliente</div>
            </div>

            <div class=" border-b border-gray-200 dark:border-neutral-700"></div>

            <div class="grid grid-cols-12">
            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                  
            
              <div class="pb-2" wire:key="{{ $item->pergunta->id }}">
                {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</h5> --}}
                <p class=" text-sm text-gray-800 dark:text-neutral-200">
                  {{ $item->pergunta->id }}. </p>
              </div>
              <div class="col-span-5">
                {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</h5> --}}
                <p class=" text-sm text-gray-800 dark:text-neutral-200">
                  {{ $item->pergunta->enunciado }}</p>
              </div>
              <div class="col-span-3">
                {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Resposta</h5> --}}
                <p class="text-sm text-gray-800 dark:text-neutral-200">{{ $item->opcaoresposta->textoResposta }}</p>
              </div>
              {{-- <div>
                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Rate</h5>
                <p class="text-gray-800 dark:text-neutral-200">5</p>
              </div> --}}
              <div class="col-span-3">
                {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Comentários do Cliente</h5> --}}
                <p class="text-sm text-gray-800 dark:text-neutral-200">{{ $item->comentariosCliente }}</p>
              </div>
            
            @endforeach
            </div>
          </div>
      </div>
        <!-- End Table -->

      

      <div class="mt-8 sm:mt-12">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Obrigado!</h4>
        <p class="text-gray-500 dark:text-neutral-500">Se tiver qualquer dúvida referente a este teste, aqui estão as informações de contato:</p>
        <div class="mt-2">
          <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">faleconosco@sobrare.com.br</p>
          <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">+55 (11) 5549-2943</p>
        </div>
      </div>

      <p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2024 SOBRARE - Todos os direitos reservados.</p>
    </div>
    <!-- End Card -->

    
  </div>
</div>
<!-- End Invoice -->

 </main>
        
        @livewireScripts
    </body>
</html>