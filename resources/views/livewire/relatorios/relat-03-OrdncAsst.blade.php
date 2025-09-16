<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'SOBRARE | Neurodiversidade' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        {{-- Adicionados para o Gráfico --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    </head>

    <body class="bg-white dark:bg-slate-700">
        <main>
<div>
<div class="max-w-[85rem] px-2 sm:px-6 lg:px-1 mx-auto my-4 sm:my-10">
  <div class="w-full mx-auto">
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
            Cod. interno: {{ $dadosRelatorio['orders_id'] }}/{{ $dadosRelatorio['idadeCliente'] }}-{{ $dadosRelatorio['estadoNascimentoCliente'] }}
            </span>
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
        <table class="w-full">
            <thead class="text-sm font-bold text-slate-700 uppercase bg-slate-200 dark:bg-slate-700 dark:text-slate-300">
                <tr>
                    <th scope="col" class="px-6 py-3 w-12">N.seq.</th>
                    <th scope="col" class="px-6 py-3 text-left">Pergunta do teste</th>
                    <th scope="col" class="px-6 py-3 w-1/4 text-center">Resposta</th>
                </tr>
            </thead>
            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
            <tbody class="{{ $loop->odd ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800' }} border-b dark:border-gray-700" style="page-break-inside: avoid;">
                <tr>
                    <th scope="row" class="px-6 py-4 text-sm font-semibold text-gray-800 dark:text-white align-top">{{ $item->pergunta->sequencia }}</th>
                    <td class="px-6 py-4 text-sm font-semibold text-gray-800 dark:text-white">{{ $item->pergunta->enunciado }}</td>
                    <td class="px-6 py-4 text-sm font-semibold text-gray-800 dark:text-white text-center align-top">{{ $item->opcaoresposta->textoResposta }}</td>
                </tr>
                @if (!empty($item->comentariosCliente))
                <tr>
                    <td></td>
                    <td colspan="2" class="px-6 pt-0 pb-4">
                        <div class="text-sm text-black dark:text-gray-200">
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
      <div class="mt-8 flex sm:justify-end">
        <div class="w-full max-w-2xl lg: text-sm sm:text-end space-y-2">
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
          </div>
      </div>
      <div class="w-full max-w-3xl mx-auto p-4 sm:p-2 md:p-8">
        <canvas id="myChart" class="w-full h-auto"></canvas>
      </div>
      <div class="mt-8 sm:mt-12">
        <p class="text-gray-500 dark:text-neutral-500">{!! $dadosRelatorio['textoFecha'] !!}</p>
        <div class="mt-2">
            <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">{!! $dadosRelatorio['textoRodape'] !!}</p>
        </div>
      </div>
    </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
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
                    barThickness: 30,
                    barPercentage: 0.8,
                    categoryPercentage: 0.8
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
                        max: 10,
                        ticks: {
                            stepSize: 1,
                            font: {
                                size: 14
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    y: {
                        ticks: {
                            font: {
                                size: 14
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
                            size: 16
                        },
                        formatter: Math.round
                    },
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
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
    });
</script>
        </main>
    </body>
</html>