

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



      
      
      <!-- Table - Respostas ao Questionário Histórico -->
      <div class="mt-6">
        <div class="border border-gray-200 p-3 rounded-lg space-y-6 dark:border-neutral-700">
    
        {{-- linha de separação --}}
      <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
          <div class="">
            <h2 class="text-xl font-semibold text-blue-600 mb-2">Inventário para Fobia Social ou Distúrbio de Ansiedade</h2>
            <div class="text-xs p-1 font-semibold text-gray-800 uppercase dark:text-neutral-500"></div>
            {{-- <div class="col-span-5 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Pergunta do teste</div>
            <div class="col-span-3 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Resposta</div>
            <div class="col-span-3 p-1 text-start text-xs font-semibold text-gray-800 uppercase dark:text-neutral-500">Comentários do Cliente</div> --}}
          </div>

          <div class=" border-b border-gray-200 dark:border-neutral-700"></div>

          <div class="grid grid-cols-12">
          @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                
          
            
            <div class="col-span-12 text-orange-500">
              {{-- <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Comentários do Cliente</h5> --}}
              {{-- <p class="text-sm p-1 font-semibold dark:text-neutral-200 --}}
              
              @php
              // Determine the subheading of a group of answers
              $subHeading = match ($item->sequencia) {
                  1 => 'Componentes de Ansiedade [CID 10 F41]: ',
                  64 => 'Componentes de TDA e Hiperatividade [CID 10 F90]: ',
                  69 => 'Componentes de Alteração do Humor [CID 10 F30.1]: ',
                  79 => 'Componentes de TDA(H) e Impulsividade [CID 10 F90]: ',
                  default => '',
              };
              @endphp

              <p class="text-sm font-medium text-gray-800 uppercase dark:text-neutral-500">{{ $subHeading }} </p>
                

                @if(!isset( $item->textoResposta->textoResposta )) 
                    <p></p>
                @else 
                      
                      @php
                            // Determine the text color based on numSeqResp
                            $textColor = match ($item->opcaoResposta->numSeqResp) {
                                2 => 'text-blue-500',
                                3 => 'text-orange-500',
                                4 => 'text-red-500',
                                default => 'text-green-500',
                            };
                      @endphp
                      <p class="text-sm p-1 font-semibold dark:text-neutral-200 {{ $textColor }}">
                        {{ $item->textoResposta->textoResposta }}
                      </p>

                     


                             
                  @if(isset($item->comentariosCliente))

                      <p class="text-sm p-1 dark:text-neutral-200 {{ $textColor }}">Comentário: {{ $item->comentariosCliente }}</p>
                  @endif
              
                @endif
            </div>
          
          @endforeach
          </div>
        </div>
      </div>
      <!-- End Table -->

      

      
      
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

 