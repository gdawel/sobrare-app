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
          
          {{-- ///  RELATÓRIO Interações Sociais e Neurodivergências --}}

          <div class="mt-2">
                        <p class="block text-xs text-black dark:text-neutral-200">{!! $dadosRelatorio['textoIntro'] !!}</p>
                        
          </div>
          
                @php
                      $cores = [
                                  "#FF5733", 
                                  "#33FF57",
                                  "#5733FF",
                                  "#FF33A1",
                                  "#33FFF5",
                                  "#A133FF",
                                  "#FF0000"
                                ];

                      $corespasteis = [
                                  "#FFB3BA", // Rosa claro
                                  "#FFDFBA", // Pêssego suave
                                  "#FFFFBA", // Amarelo pastel
                                  "#B3FFBA", // Verde menta
                                  "#BAE1FF", // Azul bebê
                                  "#D4C2FC", // Lilás suave
                                  "#FFC2E0", // Rosa bebê
                                  "#C2FCF2"  // Azul turquesa pastel

                                ];

                    $colors1 = $cores;
                    $colors2 = $cores;
                    //dd($colors);

                    $labels1 = collect($arrayTipoItemNeurodiv)->pluck(0)->toArray();
                    $values1 = collect($arrayTipoItemNeurodiv)->pluck(1)->toArray();
                    $labels2 = collect($arrayDiscipFavorNeurodiv)->pluck(0)->toArray();
                    $values2 = collect($arrayDiscipFavorNeurodiv)->pluck(1)->toArray();
                @endphp

                <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
                <canvas id="barChart1"></canvas>

                <div class="mt-2">
                        <p class="block text-xs text-black dark:text-neutral-200">{!! $dadosRelatorio['textoFecha'] !!}</p>
                        
                </div>
                <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
                <canvas id="barChart2"></canvas>


                
                {{-- <div class="mt-2">
                      <p class="block text-xs text-black dark:text-neutral-200">{!! $arrayTipoItemNeurodiv !!}</p>
              
                </div> --}}
                <div class="mt-2">
                      {{-- <p class="block text-xs text-black dark:text-neutral-200">{!! $arrayDiscipFavorNeurodiv !!}</p> --}}
              
                </div>
                

                


        

         
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
    document.addEventListener('DOMContentLoaded', function () {
        var ctx1 = document.getElementById('barChart1').getContext('2d');
        var ctx2 = document.getElementById('barChart2').getContext('2d');

        var barChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: @json($labels1),
                datasets: [{
                    // label: '',
                    data: @json($values1),
                    backgroundColor: @json($colors1),
                    borderColor: @json($colors1),
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: { x: { beginAtZero: true, max: 100 } },
                plugins: {
                    legend: {
                        display: false // 🔥 Isso desativa completamente a legenda
                    },
                    title: {
                        display: true,
                        text: '📊 Aspectos corrosivos às Neurodivergências',
                        font: { size: 18, weight: 'bold' },
                        color: '#303'
                    }
                }

            }
        });

        var barChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: @json($labels2),
                datasets: [{
                    label: '',
                    data: @json($values2),
                    backgroundColor: @json($colors2),
                    borderColor: @json($colors2),
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: { x: { beginAtZero: true, max: 100 } },
                plugins: {
                    legend: {
                        display: false // 🔥 Isso desativa completamente a legenda
                    },
                    title: {
                        display: true,
                        text: '📊 Disciplinas favoráveis às Neurodivergências - 100% é a excelência',
                        font: { size: 18, weight: 'bold' },
                        color: '#303'
                    }
                }
            }
        });
    });
</script>