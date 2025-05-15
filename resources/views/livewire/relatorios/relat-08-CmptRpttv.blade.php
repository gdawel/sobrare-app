

<!-- Invoice -->
<div>
<div class="max-w-[85rem] px-1 sm:px-2 lg:px-1 mx-auto my-4 sm:my-10">
  <div class="w-full lg:w-3/4 mx-auto">
    <!-- Card -->
    <div class="flex flex-col p-0 sm:p-10 bg-white shadow-md rounded-xl dark:bg-neutral-800">
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

      <div class="mt-8 sm:mt-12">
        
        <p class="font-bold text-black dark:text-neutral-500">{!! $dadosRelatorio['textoIntro'] !!}</p>
        
        
      </div>



      
      <div class="container mx-auto p-0">
        <table class="w-full border-collapse border-2 border-gray-300 text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border-2 border-gray-300 p-2 text-left">Comportamentos de:</th>
                    <th class="border-2 border-gray-300 p-2 text-center w-16">%</th>
                    <th class="border-2 border-gray-300 p-2 text-left">Típicos de</th>
                    <th class="border-2 border-gray-300 p-2 text-left">Resumo das tendências em minhas repetições:</th>
                </tr>
            </thead>
            <tbody>
                <!-- CM Section -->
                <tr>
                    <td rowspan="2" class="border-2 border-gray-300 p-2 bg-green-100 font-bold text-center">{{ $this->diagnosticoCM }}
                                    <br><br>{{$this->percentCM}}%<br><br>CM</td>
                    <td class="border-2 border-gray-300 p-2 text-center"> {{$this->percentSistematizacao}}%</td>
                    <td class="border-2 border-gray-300 p-2">Sistematização</td>
                    <td class="border-2 border-gray-300 p-2">
                        <div> {{ $resultadoTeste[0]->textoResposta->textoResposta }} </div>
                        <div>{{ $resultadoTeste[1]->textoResposta->textoResposta }} </div>
                    </td>
                </tr>
                <tr>
                    <td class="border-2 border-gray-300 p-2 text-center">{{$this->percentRegulacao}}%</td>
                    <td class="border-2 border-gray-300 p-2">Regulação</td>
                    <td class="border-2 border-gray-300 p-2">
                        
                        <div> {{ $resultadoTeste[2]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[3]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[4]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[5]->textoResposta->textoResposta }} </div>
                    </td>
                </tr>
    
                <!-- IM Section -->
                <tr>
                    <td rowspan="3" class="border-2 border-gray-300 p-2 bg-green-100 font-bold text-center">{{ $this->diagnosticoIM }}
                                      <br><br>{{$this->percentIM}}%<br><br>IM</td>
                    <td class="border-2 border-gray-300 p-2 text-center">{{$this->percetInteresses}}%</td>
                    <td class="border-2 border-gray-300 p-2">Interesses</td>
                    <td class="border-2 border-gray-300 p-2">
                        <div> {{ $resultadoTeste[6]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[7]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[8]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[9]->textoResposta->textoResposta }} </div>
                    </td>
                </tr>
                <tr>
                    <td class="border-2 border-gray-300 p-2 text-center">{{$this->percentAcumulacao}}%</td>
                    <td class="border-2 border-gray-300 p-2">Acumulação</td>
                    <td class="border-2 border-gray-300 p-2">
                        <div> {{ $resultadoTeste[10]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[11]->textoResposta->textoResposta }} </div>
                    </td>
                </tr>
                <tr>
                    <td class="border-2 border-gray-300 p-2 text-center">{{$this->percentMesmice}}%</td>
                    <td class="border-2 border-gray-300 p-2">Mesmice</td>
                    <td class="border-2 border-gray-300 p-2">
                        <div> {{ $resultadoTeste[12]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[13]->textoResposta->textoResposta }} </div>
                    </td>
                </tr>
    
                <!-- RS Section -->
                <tr>
                    <td rowspan="2" class="border-2 border-gray-300 p-2 bg-green-100 font-bold text-center">{{ $this->diagnosticoRS }}
                                    <br><br>{{$this->percentRS}}%<br><br>RS</td>
                    <td class="border-2 border-gray-300 p-2 text-center">{{$this->percentSensibilidade}}%</td>
                    <td class="border-2 border-gray-300 p-2">Sensibilidade</td>
                    <td class="border-2 border-gray-300 p-2">
                        <div> {{ $resultadoTeste[14]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[15]->textoResposta->textoResposta }} </div>
                    </td>
                </tr>
                <tr>
                    <td class="border-2 border-gray-300 p-2 text-center">{{$this->percentRestricao}}%</td>
                    <td class="border-2 border-gray-300 p-2">Restrição</td>
                    <td class="border-2 border-gray-300 p-2">
                        <div> {{ $resultadoTeste[16]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[17]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[18]->textoResposta->textoResposta }} </div>
                        <div> {{ $resultadoTeste[19]->textoResposta->textoResposta }} </div>
                    </td>
                </tr>
                <div class="container mx-auto p-4">
                  <!-- Previous table code remains the same until the last row -->
                  
                          <!-- Add this new row after the last RS row -->
                          <tr>
                              <td class="border-2 border-gray-400 p-2"></td>
                              <td class="border-2 border-gray-400 p-2 text-center">{{$this->percentSomaTendencia}}%</td>
                              <td class="border-2 border-gray-400 p-2">de tendência na repetição de comportamentos</td>
                              <td class="border-2 border-gray-400 p-2">
                                  <div class="mb-4">
                                      <strong>Observação:</strong> Os comportamentos repetitivos estão presentes no TEA. Também estão pressentes no Transtorno Obsessivo-Compulsivo, no Transtorno de Personalidade Anancastica, na Doença de Parkinson e na Síndrome de Tourette. Em particular no TEA de Nível 1 (Síndrome de Asperger), se tornam discretos devido à aprendizagem social que ocorreu durante os anos de vida. Quanto maior for a idade, maior será o treino social e maior será a probabilidade de NÃO ser detectado. Verifique com seu/sua psicólogo(a), qual dos quadros é mais possível em suas respostas.
                                  </div>
                                  <div class="mt-4">
                                      <strong>Legenda:</strong> CM = Comportamentos Motores e reguladores / IM = Insistência na mesmice / RS = Respostas Sensoriais
                                  </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              
                  <!-- Citation section -->
                  <div class="mt-6 text-sm text-gray-700 p-4 border-t-2 border-gray-200">
                      <p class="mb-2"><strong>Elaboração e Organização:</strong> Dr. George Barbosa (Barbosa, GS., 2019)</p>
                      <p class="mb-2"><strong>Fonte:</strong> Barrett, S.L., Uljarević, M., Baker, E.K. et al. The Adult Repetitive Behaviours Questionnaire-2 (RBQ-2A): A Self-Report Measure of Restricted and Repetitive Behaviours. J Autism Dev Disord 45, 3680–3692 (2015).</p>
                      <p class="mb-2">Leekam, S, Tandos, J., McConachie, H., Meins, E., Parkinson, K., Wright, C.,Turner, M., Arnott, B., Vittorini, L., & Le Couteur, A. (2007). Repetitive behaviours in typically developing 2-year-olds. Journal of Child Psychology and Psychiatry, 48, 11, 1131-1138. doi: 10.1111/j.1469-7610.2007.01778.x</p>
                      <p>Bishop, S.L., Richler, J., & Lord, C. (2006). Association between restricted and repetitive behaviors and nonverbal IQ in children with autism spectrum disorders. Child Neuropsychology, 12, 247– 267. - Uso interno.</p>
                  </div>
              </div>
            </tbody>
        </table>
    </div>
      

      
      
      <div class="mt-8 sm:mt-12">
        {{-- <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Como entender o seu resultado de estresse e fadiga:<br></h4> --}}
        <p class="font-bold text-black dark:text-neutral-500">{!! $dadosRelatorio['textoFecha'] !!}</p>
        <div class="mt-2">
          <p class="block text-sm font-bold text-black dark:text-neutral-200">{!! $dadosRelatorio['textoRodape'] !!}</p>
          
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

 