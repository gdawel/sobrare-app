
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'SOBRARE | Neurodiversidade' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        

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
          <span class="mt-1 block font-semibold text-gray-800 dark:text-neutral-500">
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
          <address class="mt-2 not-italic font-semibold text-gray-800 dark:text-neutral-500">
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
              <dd class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ $dadosRelatorio['dataEmissao'] }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Respondido em:</dt>
              <dd class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ $dadosRelatorio['dataFinalTeste'] }}</dd>
            </dl>
          </div>
          <!-- End Grid -->
        </div>
        <!-- Col -->
      </div>
      <!-- End Grid -->

   



      
      
      <!-- Table - Respostas ao Questionário Histórico -->
      <div class="mt-6">
        <div class="border border-gray-200 p-4 rounded-lg space-y-6 dark:border-neutral-700">
    
        {{-- linha de separação --}}
      <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
          <div class="grid grid-cols-12 ">
            <div class="text-sm font-semibold text-gray-800 uppercase dark:text-neutral-500">N. Seq.</div>
            <div class="col-span-5 text-start text-sm font-semibold text-gray-800 uppercase dark:text-neutral-500">Pergunta do teste</div>
            <div class="col-span-3 text-start text-sm font-semibold text-gray-800 uppercase dark:text-neutral-500">Resposta</div>
            <div class="col-span-3 text-start text-sm font-semibold text-gray-800 uppercase dark:text-neutral-500">Comentários do Cliente</div>
          </div>

          <div class=" border-b border-gray-200 dark:border-neutral-700"></div>

          <div class="grid grid-cols-12">
          @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                
          
            <div class="pb-2" wire:key="{{ $item->pergunta->id }}">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</h5> --}}
              <p class=" text-sm font-semibold text-gray-800 dark:text-neutral-200">
                {{ $item->pergunta->id }}. </p>
            </div>
            <div class="col-span-5">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</h5> --}}
              <p class=" text-sm font-semibold text-gray-800 dark:text-neutral-200">
                {{ $item->pergunta->enunciado }}</p>
            </div>
            <div class="col-span-3">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Resposta</h5> --}}
              <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $item->opcaoresposta->textoResposta }}</p>
            </div>
            {{-- <div>
              <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Rate</h5>
              <p class="text-gray-800 dark:text-neutral-200">5</p>
            </div> --}}
            <div class="col-span-3">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Comentários do Cliente</h5> --}}
              <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $item->comentariosCliente }}</p>
            </div>
          
          @endforeach
          </div>
        </div>
      </div>
      <!-- End Table -->

      <!-- Flex -->
      <div class="mt-8 flex sm:justify-end">
        <div class="w-full max-w-2xl sm:text-end space-y-2">
          <!-- Grid -->
          <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
            <dl class="grid sm:grid-cols-5 gap-x-3">
              {{-- <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Resultado:</dt> --}}
              {{-- <dd id="result" class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500"> data-variavel={{ number_format($resultado, 2, '.'); }}</dd> --}}
              {{-- <dd id="result" class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500"> data-variavel={{ $resultado }}</dd> --}}

              <dd id="result" class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500" data-variavel="{{ number_format($resultado, 2, '.'); }}">
                {{-- Conteúdo opcional aqui --}}
            </dd>


            </dl>

            {{-- <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Total:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$2750.00</dd>
            </dl>

            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Tax:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$39.00</dd>
            </dl>

            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Amount paid:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$2789.00</dd>
            </dl>

            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Due balance:</dt>
              <dd class="col-span-2 text-gray-500 dark:text-neutral-500">$0.00</dd>
            </dl> --}}
          </div>
          <!-- End Grid -->
        </div>
      </div>
      
      <div wire:ignore>
        <canvas id="myChart" class="h-8 w-80"></canvas>
      </div>
      <!-- End Flex -->

      <div class="mt-8 sm:mt-12">
        {{-- <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Como entender o seu resultado de estresse e fadiga:<br></h4> --}}
        <p class="text-lg text-justify font-semibold text-gray-800 dark:text-neutral-200">{!! $dadosRelatorio['textoFecha'] !!}</p>
        <div class="mt-2">
          <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">{!! $dadosRelatorio['textoRodape'] !!}</p>
          
        </div>
      </div>

      {{-- <p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© SOBRARE - Todos os direitos reservados.</p> --}}
    </div>
        
    </div>
    <!-- End Card -->

    
  </div>
</div>

</main>
<!-- End Invoice -->

 
        <script>
          const ctx = document.getElementById('myChart');

          /* const resultado =  $wire.resultado; */

          /* const elemento = document.getElementById('result');
          const minhaVariavel = elemento.dataset.variavel;
          console.log(elemento); */

          const elemento = document.getElementById('result');
          let minhaVariavel = elemento.dataset.variavel;

          // Converter para número se $resultado for numérico
          minhaVariavel = Number(minhaVariavel);

          /* console.log(elemento);
          console.log(minhaVariavel); */

          /* console.log(resultado); */

          Chart.register({
                id: 'datalabels',
                afterDatasetsDraw: function (chart, args, options) {
                    chart.data.datasets.forEach((dataset, i) => {
                        const meta = chart.getDatasetMeta(i);
                        meta.data.forEach((element, index) => {
                            const data = dataset.data[index];
                            const ctx = chart.ctx;
                            const x = element.x;
                            const y = element.y;

                            ctx.fillStyle = options.color || '#fff'; // Cor do texto
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'middle';
                            ctx.fillText(data, x, y);

                            // Configurações de estilo da fonte
                            ctx.font = 'bold 16px Arial'; // Negrito, tamanho 16px, fonte Arial
                            ctx.fillText(data, x, y);
                        });
                    });
                }
            });
        
          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ['Resultado'],
              datasets: [{
                label: 'Escala de 0-6',
                data: [minhaVariavel],
                borderWidth: 1,
                barThickness: 100,
                backgroundColor: ['rgba(255, 165, 0, 0.5)']
              }]
            },
            
              
                options: {
                  indexAxis: 'y',
                  scales: {
                    x: {
                      min: 0,
                      max: 6,
                      stepSize: 1
                    }
                  },
                  plugins: {
                    datalabels: {
                        color: '#00AA00' // Cor do texto dentro da barra
                      },
                      legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        font: {
                            size: 16
                        }
                    }
            }
                  }
                },
                
              
            
          });
        </script>

 
        
      </body>
      </html>