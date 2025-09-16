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
<div>
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
  <div class="sm:w-11/12 lg:w-3/4 mx-auto">
    <div class="flex flex-col p-4 sm:p-10 bg-white dark:bg-neutral-800">
      <div class="flex justify-between">
        <div>
            <img class="h-16" src="{{ asset('storage/sobrare_logo_1.jpg') }}">

          <h1 class="mt-2 pt-16 text-xl md:text-xl font-semibold text-blue-600 dark:text-white">
            {{ $dadosRelatorio['tituloTeste'] }}
            </h1>
        </div>
        <div class="text-end">
            <img class="h-16" src="{{ asset('storage/logo_neudiv_1.jpg') }}">
          <h2 class="text-base md:text-xl font-semibold text-gray-800 dark:text-neutral-200">NEURODIVERSIDADE</h2>
          <span class="mt-1 block font-semibold text-gray-800 dark:text-neutral-500">
            Cod. interno: {{ $dadosRelatorio['orders_id'] }}/{{ $dadosRelatorio['idadeCliente'] }}-{{ $dadosRelatorio['estadoNascimentoCliente'] }}</span>
        </div>
        </div>
      <div class="mt-8 grid sm:grid-cols-2 gap-3">
        <div>
          <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Para:</h3>
          <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">{{ $dadosRelatorio['nomeCliente'] }}</h3>
          <address class="mt-2 not-italic font-semibold text-gray-800 dark:text-neutral-500">
            Idade: {{ $dadosRelatorio['idadeCliente'] }}<br>
          </address>
        </div>
        <div class="sm:text-end space-y-2">
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
          </div>
        </div>
      <div class="mt-6">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black dark:text-gray-200 uppercase tracking-wider w-20">N. SEQ.</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black dark:text-gray-200 uppercase tracking-wider">Pergunta do Teste</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-black dark:text-gray-200 uppercase tracking-wider w-1/3">Resposta</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black dark:text-gray-200">{{ $item->pergunta->sequencia }}</td>
                        <td class="px-6 py-4 text-sm text-black dark:text-gray-200">{{ $item->pergunta->enunciado }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-black dark:text-gray-200">{{ $item->opcaoresposta->textoResposta }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <div class="mt-8 flex sm:justify-end">
        <div class="w-full max-w-2xl sm:text-end space-y-2">
          <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dd id="result" class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500" data-variavel="{{ number_format($resultado, 2, '.'); }}">
              </dd>
            </dl>
          </div>
        </div>
      </div>
      
      <div wire:ignore>
        <canvas id="myChart" class="h-8 w-80"></canvas>
      </div>
      <div class="mt-8 sm:mt-12">
        <p class="text-sm text-justify font-semibold text-gray-800 dark:text-neutral-200">{!! $dadosRelatorio['textoFecha'] !!}</p>
        <div class="mt-2">
          <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">{!! $dadosRelatorio['textoRodape'] !!}</p>
        </div>
      </div>

    </div>
        
    </div>
    </div>
</div>

</main>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myChart');

            const elemento = document.getElementById('result');
            let minhaVariavel = elemento.dataset.variavel;

            minhaVariavel = Number(minhaVariavel);

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

                                ctx.fillStyle = options.color || '#fff';
                                ctx.textAlign = 'center';
                                ctx.textBaseline = 'middle';
                                
                                ctx.font = 'bold 16px Arial';
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
                      animation: {
                          duration: 0 
                      },
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
                            color: '#00AA00'
                          },
                          legend: {
                         labels: {
                             font: {
                                 size: 16
                             }
                         }
                  }
                      }
                    },
            });
        });
        </script>
        
    </body>
    </html>