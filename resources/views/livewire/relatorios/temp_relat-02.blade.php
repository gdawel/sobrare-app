<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
    <div class="sm:w-11/12 lg:w-3/4 mx-auto">
      <!-- Card -->
      <div class="flex flex-col p-4 sm:p-10 bg-white rounded-xl dark:bg-neutral-800">
        <!-- Header Section -->
        <div class="flex justify-between items-start">
          <div>
            <img class="h-16" src="{{ asset('storage/sobrare_logo_1.jpg') }}">
            <h1 class="mt-4 text-2xl font-bold text-blue-600 dark:text-white">
              {{ $dadosRelatorio['tituloTeste'] }}
            </h1>
          </div>
          
          <div class="text-end">
            <img class="h-16" src="{{ asset('storage/logo_neudiv_1.jpg') }}">
            <h2 class="text-lg font-bold text-gray-800 dark:text-neutral-200">NEURODIVERSIDADE</h2>
            <span class="mt-1 block text-sm text-gray-600 dark:text-neutral-400">
              Cod. interno: {{ $dadosRelatorio['orders_id'] }}/{{ $dadosRelatorio['idadeCliente'] }}-{{ $dadosRelatorio['estadoNascimentoCliente'] }}
            </span>
          </div>
        </div>
  
        <!-- Client Information Section -->
        <div class="mt-8 grid sm:grid-cols-2 gap-3">
          <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Para:</h3>
            <h3 class="text-xl font-bold text-gray-800 dark:text-neutral-200">{{ $dadosRelatorio['nomeCliente'] }}</h3>
            <div class="mt-1 text-gray-600 dark:text-neutral-400">
              Idade: {{ $dadosRelatorio['idadeCliente'] }}
            </div>
          </div>
  
          <div class="sm:text-end space-y-2">
            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
              <dl class="grid sm:grid-cols-5 gap-x-3">
                <dt class="col-span-3 font-medium text-gray-600 dark:text-neutral-300">Emitido em:</dt>
                <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">{{ $dadosRelatorio['dataEmissao'] }}</dd>
              </dl>
              <dl class="grid sm:grid-cols-5 gap-x-3">
                <dt class="col-span-3 font-medium text-gray-600 dark:text-neutral-300">Respondido em:</dt>
                <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">{{ $dadosRelatorio['dataFinalTeste'] }}</dd>
              </dl>
            </div>
          </div>
        </div>
  
      
  
        <!-- Test Results Table -->
        <div class="mt-8">
          <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200 mb-4">Respostas ao Questionário</h3>
          
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
              <thead class="bg-gray-50 dark:bg-neutral-700">
                <tr>
                  <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-neutral-300 uppercase tracking-wider">N. Seq.</th>
                  <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-neutral-300 uppercase tracking-wider">Pergunta do teste</th>
                  <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-neutral-300 uppercase tracking-wider">Resposta</th>
                </tr>
              </thead>
              <tbody class="bg-white dark:bg-neutral-800 divide-y divide-gray-200 dark:divide-neutral-700">
                @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                <tr>
                  <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $item->pergunta->id }}.</td>
                  <td class="px-4 py-3 text-sm text-gray-800 dark:text-neutral-200">{{ $item->pergunta->enunciado }}</td>
                  <td class="px-4 py-3 text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $item->opcaoresposta->textoResposta }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
  
        <div wire:ignore>
            <canvas id="myChart"></canvas>
          </div>

        <!-- Conclusion Section -->
        <div class="mt-8">
          <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200 mb-2">Interpretação dos Resultados</h3>
          <div class="prose dark:prose-invert max-w-none">
            <p class="text-gray-800 dark:text-neutral-200">{!! $dadosRelatorio['textoFecha'] !!}</p>
          </div>
        </div>
  
        <!-- Footer -->
        <div class="mt-8 pt-4 border-t border-gray-200 dark:border-neutral-700">
          <p class="text-sm text-gray-600 dark:text-neutral-400">{!! $dadosRelatorio['textoRodape'] !!}</p>
        </div>
      </div>
    </div>
  </div>
  
  @script

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

        @endscript
        
    