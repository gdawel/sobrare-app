
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
<div class="max-w-[85rem] px-2 sm:px-6 lg:px-1 mx-auto my-4 sm:my-10">
  <div class="w-full sm:w-11/12 lg:w-3/4 mx-auto">
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
        <div class="border border-gray-200 p-6 rounded-lg space-y-6 dark:border-neutral-700">
    
        {{-- linha de separação --}}
      <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
          <div class="grid grid-cols-12 ">
            <div class="text-sm p-1 font-semibold text-gray-800 uppercase dark:text-neutral-500">N. Seq.</div>
            <div class="col-span-5 p-1 text-start text-sm font-semibold text-gray-800 uppercase dark:text-neutral-500">Pergunta do teste</div>
            <div class="col-span-3 p-1 text-start text-sm font-semibold text-gray-800 uppercase dark:text-neutral-500">Resposta</div>
            <div class="col-span-3 p-1 text-start text-sm font-semibold text-gray-800 uppercase dark:text-neutral-500">Comentários do Cliente</div>
          </div>

          <div class=" border-b border-gray-200 dark:border-neutral-700"></div>

          <div class="grid grid-cols-12">
          @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                
          
            <div class="pb-2" wire:key="{{ $item->pergunta->id }}">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</h5> --}}
              <p class=" text-sm p-1 font-semibold text-gray-800 dark:text-neutral-200">
                {{ $item->pergunta->sequencia }}. </p>
            </div>
            <div class="col-span-5">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Pergunta do teste</h5> --}}
              <p class=" text-sm p-1 font-semibold text-gray-800 dark:text-neutral-200">
                {{ $item->pergunta->enunciado }}</p>
            </div>
            <div class="col-span-3">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Resposta</h5> --}}
              <p class="text-sm p-1 font-semibold text-gray-800 dark:text-neutral-200">{{ $item->opcaoresposta->textoResposta }}</p>
            </div>
            {{-- <div>
              <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Rate</h5>
              <p class="text-gray-800 dark:text-neutral-200">5</p>
            </div> --}}
            <div class="col-span-3">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Comentários do Cliente</h5> --}}
              <p class="text-sm p-1 font-semibold text-gray-800 dark:text-neutral-200">{{ $item->comentariosCliente }}</p>
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
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">A minha comunicação:</dt>
              <dd class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ number_format($comunicacao, 2, ','); }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">O tipo do meu pensamento :</dt>
              <dd class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ number_format($pensamento, 2, ','); }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Meu processo de atenção:</dt>
              <dd class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ number_format($atencao, 2, ','); }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Minha tensão muscular:</dt>
              <dd class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ number_format($tensao, 2, ','); }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Meu desempenho social:</dt>
              <dd class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ number_format($social, 2, ','); }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Meus estados emocionais:</dt>
              <dd class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ number_format($emocional, 2, ','); }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Condições mentais e físicas:</dt>
              <dd class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ number_format($mental, 2, ','); }}</dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Minha sexualidade e lazer:</dt>
              <dd class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500">{{ number_format($sexualidade, 2, ','); }}</dd>
            </dl>

            
          </div>
          <!-- End Grid -->
        </div>
      </div>
      <!-- End Flex -->

      {{-- <div wire:ignore class="p-6">
        <canvas id="myChart"></canvas>
      </div> --}}

      <div class="w-full max-w-3xl mx-auto p-4 sm:p-2 md:p-8">
        <canvas id="myChart" class="w-full h-auto"></canvas>
      </div>

      <div class="mt-8 sm:mt-12">
        {{-- <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Como entender o seu resultado de estresse e fadiga:<br></h4> --}}
        <p class="text-gray-500 dark:text-neutral-500">{!! $dadosRelatorio['textoFecha'] !!}</p>
        <div class="mt-2">
          <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">{!! $dadosRelatorio['textoRodape'] !!}</p>
          
        </div>
      </div>

      {{-- <p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2024 SOBRARE - Todos os direitos reservados.</p> --}}
    </div>

      {{-- <div class="mt-8 sm:mt-12">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Obrigado!</h4>
        <p class="text-gray-500 dark:text-neutral-500">Se tiver qualquer dúvida referente a este teste, aqui estão as informações de contato:</p>
        <div class="mt-2">
          <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">faleconosco@sobrare.com.br</p>
          <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">+55 (11) 5549-2943</p>
        </div>
      </div>

      <p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2024 SOBRARE - Todos os direitos reservados.</p> --}}
    </div>
    <!-- End Card -->

    
  </div>
</div>
<!-- End Invoice -->




    {{-- <script>
      const ctx = document.getElementById('myChart');

      const dadosGrafico = {{ Js::from($dadosGrafico) }};
      const assuntos = dadosGrafico.map(item => item.Assuntos);
      const valores = dadosGrafico.map(item => item.Valor);

      const cores = [
          'rgba(255, 99, 132, 0.8)',
          'rgba(54, 162, 235, 0.8)',
          'rgba(255, 206, 86, 0.8)',
          'rgba(75, 192, 192, 0.8)',
          'rgba(153, 102, 255, 0.8)',
          'rgba(255, 159, 64, 0.8)'
      ];

      new Chart(ctx, {
          type: 'bar',
          data: {
              labels: assuntos,
              datasets: [{
                  label: 'Relevância dos Assuntos',
                  data: valores,
                  backgroundColor: cores,
                  barThickness: 20, // Diminui a espessura das barras em telas pequenas
                  barPercentage: 0.8,
                  categoryPercentage: 0.8
              }]
          },
          options: {
              indexAxis: 'y',
              /* responsive: true,
              maintainAspectRatio: false, */
              scales: {
                  x: {
                      min: 0,
                      max: 10,
                      ticks: {
                          stepSize: 1,
                          font: {
                              size: 12 // Diminui o tamanho da fonte
                          }
                      },
                      grid: {
                          color: 'rgba(0, 0, 0, 0.1)'
                      }
                  },
                  y: {
                      ticks: {
                          font: {
                              size: 12 // Diminui o tamanho da fonte
                          },
                          callback: function(value, index, values) {
                              var label = assuntos[index];
                              return label.length > 10 ? label.substring(0, 10) + '\n' + label.substring(10) : label; // Quebra de linha
                          }
                      },
                      grid: {
                          display: false
                      }
                  }
              },
              plugins: {
                  datalabels: {
                      anchor: 'center',
                      align: 'center',
                      color: 'darkblue',
                      font: {
                          weight: 'bold',
                          size: 12 // Diminui o tamanho da fonte
                      },
                      formatter: Math.round
                  },
                  legend: {
                      position: 'bottom', // Move a legenda para a parte inferior
                      labels: {
                          font: {
                              size: 12 // Diminui o tamanho da fonte
                          }
                      }
                  }
              },
              layout: {
                  padding: {
                      left: 10, // Diminui o padding
                      right: 10, // Diminui o padding
                      top: 10, // Diminui o padding
                      bottom: 10 // Diminui o padding
                  }
              }
          },
          plugins: [ChartDataLabels]
      });
    </script> --}}
    
    <script>
      const ctx = document.getElementById('myChart');
  
      const dadosGrafico = {{ Js::from($dadosGrafico) }};
      const assuntos = dadosGrafico.map(item => item.Assuntos);
      const valores = dadosGrafico.map(item => item.Valor);
  
      const cores = [
          'rgba(255, 99, 132, 0.8)',
          'rgba(54, 162, 235, 0.8)',
          'rgba(255, 206, 86, 0.8)',
          'rgba(75, 192, 192, 0.8)',
          'rgba(153, 102, 255, 0.8)',
          'rgba(255, 159, 64, 0.8)'
      ];
  
      new Chart(ctx, {
          type: 'bar',
          data: {
              labels: assuntos,
              datasets: [{
                  label: 'Relevância dos Assuntos', // Legenda abreviada
                  data: valores,
                  backgroundColor: cores,
                  barThickness: 30, // Ajusta a espessura das barras
                  barPercentage: 0.8, // Ajusta o espaçamento das barras
                  categoryPercentage: 0.8 // Ajusta o espaçamento das barras
              }]
          },
          options: {
              indexAxis: 'y',
              scales: {
                  x: {
                      min: 0,
                      max: 10,
                      ticks: {
                          stepSize: 1,
                          font: {
                              size: 14 // Aumenta o tamanho da fonte
                          }
                      },
                      grid: {
                          color: 'rgba(0, 0, 0, 0.1)' // Ajusta a cor da grade
                      }
                  },
                  y: {
                      ticks: {
                          font: {
                              size: 14 // Aumenta o tamanho da fonte
                          }
                      },
                      grid: {
                          display: false // Remove a grade do eixo Y
                      }
                  }
              },
              plugins: {
                  datalabels: {
                      anchor: 'center',
                      align: 'center',
                      color: 'darkblue',
                      font: {
                          weight: 'bold',
                          size: 16
                      },
                      formatter: Math.round
                  },
                  legend: {
                      position: 'top', // Ajusta a posição da legenda
                      labels: {
                          font: {
                              size: 14 // Ajusta o tamanho da fonte da legenda
                          }
                      }
                  }
              },
              layout: {
                  padding: {
                      left: 20,
                      right: 20,
                      top: 20,
                      bottom: 20
                  }
              }
          },
          plugins: [ChartDataLabels]
      });
  </script>

 
       