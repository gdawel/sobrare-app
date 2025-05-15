{{-- @dd($dadosRelatorio); --}}

<!-- Invoice -->
<div class="max-w-4xl mx-auto my-8 bg-white shadow-lg rounded-lg dark:bg-neutral-800">
  <!-- First Line -->
  <div class="flex justify-between items-center py-4 px-6">
      <img src="{{ asset('storage/sobrare_logo_1.jpg') }}" alt="Sobrare Logo" class="h-12">
      <h1 class="text-xl font-bold text-center text-blue-600 dark:text-white uppercase">NEURODIVERSIDADE</h1>
      <img src="{{ asset('storage/logo_neudiv_1.jpg') }}" alt="Neurodiv Logo" class="h-12">
  </div>
  <!-- Horizontal Line -->
  <hr class="border-gray-300 dark:border-gray-600">
  <!-- Second Line -->
  <div class="py-4 px-6">
      <h2 class="text-2xl font-bold text-center text-blue-600 dark:text-blue-400">{{ $dadosRelatorio['tituloTeste'] }}</h2>
  </div>
  <!-- Horizontal Line -->
  <hr class="border-gray-300 dark:border-gray-600">
  <!-- Third Line -->
  <div class="py-4 px-6 flex justify-between text-sm font-medium text-gray-800 dark:text-gray-400">
      <div>
          <p><span class="font-semibold">Nome:</span> {{ $dadosRelatorio['nomeCliente'] }}</p>
          <p><span class="font-semibold">Idade:</span> {{ $dadosRelatorio['idadeCliente'] }}</p>
      </div>
      <div class="text-right">
          <p><span class="font-semibold">Respondido em:</span> {{ $dadosRelatorio['dataFinalTeste'] }}</p>
          <p><span class="font-semibold">Emitido em:</span> {{ $dadosRelatorio['dataEmissao'] }}</p>
      </div>
  </div>
 
        
            
          
          {{-- ///  RELATÓRIO CARACTERÍSTICAS LIGADAS À DISLEXIA, ATENÇÃO E A CONCENTRAÇÃO  Adultos --}}
          

                <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
                    
      
                    <table class="w-full table-auto border-collapse">
                        {{-- <thead>
                            <tr class="bg-blue-100 dark:bg-dark-3 text-gray-700 dark:text-gray-300 text-sm font-bold">
                                <th class="border border-gray-300 py-1 px-2 text-center w-1/12">Seq.</th>
                                <th class="border border-gray-300 py-1 px-2 text-left w-4/12">Áreas mapeadas na cognição</th>
                                
                                <th class="border border-gray-300 py-1 px-2 text-left w-auto">Este mapeamento é um indicativo para a hipótese diagnóstica. E1plicita as ocorrências presentes em áreas cognitivas e que são subsídios ao processo psicoterapêutico:
                                </th>
                            </tr>
                        </thead> --}}
                        <tbody>

                          <tr class="bg-blue-100 dark:bg-dark-3 text-gray-700 dark:text-gray-300 text-lg font-bold">
                            
                            <td class="border border-gray-300 py-1 px-2 text-center w-4/12">Sua percepção de cansaço: {!! number_format($indiceCansaco, 2, '.'); !!}</td>
                        
                          </tr>

                          <tr>
                            <td class="content-center">
                              <dl >
                                {{-- <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Resultado:</dt> --}}
                                {{-- <dd id="result" class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500"> data-variavel={{ number_format($resultado, 2, '.'); }}</dd> --}}
                                {{-- <dd id="result" class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500"> data-variavel={{ $resultado }}</dd> --}}
                  
                                <dd id="result" class="col-span-2 font-semibold text-gray-800 dark:text-neutral-500" data-variavel="{{ number_format($indiceCansaco, 2, '.'); }}">
                                  {{-- Conteúdo opcional aqui --}}
                              </dd>

                              <div wire:ignore>
                                <canvas id="myChart" class="h-4 w-40"></canvas>
                              </div>
                            </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="mt-2">
                              <p class="block text-xs text-black dark:text-neutral-200">{!! $dadosRelatorio['textoIntro'] !!}</p>
                              
                            </div>    
                          </td>
                        </tr>
                        
                        
                            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                                    
                        
                                   @if( $item->textoResposta->textoResposta ) 
                                    <tr>
                                        <td class="border border-gray-300 py-1 px-6 text-sm dark:text-gray-400 align-top">
                                            {{ $textoCompleto = $item->textoResposta->textoResposta; }}
                                        </td>
                                        {{-- <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                                            {{ $areasMapeadas }}
                                        </td>
                                        <td class="border border-gray-300 py-1 px-2 text-xs dark:text-gray-400 align-top">
                                            {{ $anomalidadePercebida }}
                                        </td> --}}
                                    </tr>
                                    @endif
                            @endforeach
                    
                        </tbody>
            </table>

            <p class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">Negativos: {{ $contarNegativos }}</p>
            <p class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">Positivos: {{ $contarPositivos }}</p>
            <p class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">(C)-Dife, Negat - Posit: {{ $diferencaPositNegat }}</p>
            <p class="border border-gray-300 py-1 px-2 text-center text-xs dark:text-gray-400 align-top">Celula D38: {{ $celulaD38 }}</p>
            <p colspan="3" class="border border-gray-300 py-2 px-4 text-sm dark:text-gray-400">Índice de Cansaço: {!! $indiceCansaco !!}</p>
          <!-- End Table -->
          <!-- ===================> FIM Devolutiva quanto a hipótese de TDA ou TDAH <================== -->

            <div class="mt-2">
              <p class="block text-xs text-black dark:text-neutral-200">{!! $dadosRelatorio['textoFecha'] !!}</p>
              <div class="mt-2">
                <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200"><br>{!! $dadosRelatorio['textoRodape'] !!}</p>
                
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
            label: 'Escala de 0-8',
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
                  max: 8,
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