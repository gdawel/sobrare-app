<div wire:key="montar">
    
   
<!-- ====== Section: Identificação do Cliente - Start -->
<section  class="bg-white dark:bg-dark py-20 lg:py-[5px]">
   <div wire:model.live="dadosCliente" class="container mx-auto">
      <div class="flex flex-wrap -mx-4">
         <div class="w-full px-4">
            <div class="max-w-full overflow-x-auto">
               <table class="w-full ">
                  
                  <tbody>
                     <tr>
                        <td
                           class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                           Nome: 
                        </td>
                        <td wire:model.live="qualCliente"
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-left text-base font-medium"
                           >
                           {{ $this->dadosCliente->name }}
                        </td>

                     </tr>
                     <tr>
                        <td
                           class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                           E-mail: 
                        </td>
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-left text-base font-medium"
                           >
                           {{ $this->dadosCliente->email }}
                        </td>
                        
                     </tr>
                     <tr>
                        <td
                           class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                           Tipo: 
                        </td>
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-left text-base font-medium"
                           >
                           {{ $this->dadosCliente->usertype }}
                        </td>
                        
                        
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- ====== Section: Identificação do Cliente - End -->

    <h2 class="text-dark text-center text-base font-medium py-1">Dados do Pedido do Cliente</h2>

<!-- ====== Section: Dados do Pedido do Cliente - Start -->
<section class="bg-white dark:bg-dark py-20 lg:py-[5px]">
   <div class="container mx-auto">
      <div class="flex flex-wrap -mx-4">
         <div class="w-full px-4">
            <div class="max-w-full overflow-x-auto">
               <table class="w-full table-auto">
                  <thead >
                    <tr class="text-center bg-primary">
                        <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                            N. Pedido
                        </th>
                    
                    {{-- </tr>
                    <tr class="text-center bg-primary"> --}}
                        <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                            Total do Pedido
                        </th>
                    {{-- </tr>
                    <tr class="text-center bg-primary"> --}}
                        <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                            Meio de Pagamento
                        </th>
                    {{-- </tr>
                    <tr class="text-center bg-primary"> --}}
                        <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                            Situação do Pagamento
                        </th>
                        <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                            Data
                        </th>
                    </tr>
                  </thead>
                  <tbody >
                     <tr>
                        
                        <td
                           class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                           {{ $this->clienteSelecionado->id }}
                        </td>

                    
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                           {{ $this->clienteSelecionado->grand_total }}
                        </td>
                        
                     
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                           {{ $this->clienteSelecionado->paymentMethod }}
                        </td>
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                           {{ $this->clienteSelecionado->paymentStatus }}
                        </td>
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                           {{ date('d-m-Y', strtotime($this->clienteSelecionado->orderDate)) }}
                        </td>
                        
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- ====== Section: Dados do Pedido do Cliente - End -->
    <h2 class="text-dark text-center text-base font-medium py-1">Testes neste Pedido</h2>

<!-- ====== Section: Testes referentes ao Pedido do Cliente - Start -->
<section class="bg-white dark:bg-dark py-20 lg:py-[5px]">
   <div class="container mx-auto">
      <div class="flex flex-wrap -mx-4">
         <div class="w-full px-4">
            <div class="max-w-full overflow-x-auto">
               <table class="w-full table-auto">
                  <thead >
                    <tr class="text-center bg-primary">
                        <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                            N. Teste
                        </th>
                    
                    {{-- </tr>
                    <tr class="text-center bg-primary"> --}}
                        <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                            Nome do Teste
                        </th>
                    {{-- </tr>
                    <tr class="text-center bg-primary"> --}}
                        <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                            Status
                        </th>
                    {{-- </tr>
                    <tr class="text-center bg-primary"> --}}
                        <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                            Ação
                        </th>
                        
                    </tr>
                  </thead>
                  <tbody >
                  
                    @foreach ($this->itensPedido as $item)
                    <tr wire:key="{{ $item->testes->id }}">
                        
                        <td
                           class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                           {{ $item->testes_id }}
                        </td>

                    
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                           {{ $item->testes->nomeTeste }}
                        </td>
                        
                     
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                           >
                           {{ $item->testeStatus }}
                        </td>
                        <td >
                           @if( $item->testeStatus == "novo") 
                              <button disabled wire:click="montateste({{ $item->testes->id }})"
                                    class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                                    >
                                    Aguardando
                              </button>
                                                   
                           @elseif ( $item->testeStatus == "iniciado" ) 
                              <button wire:click="montateste({{ $item->testes->id }})"
                                    class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                                    >
                                    Responder
                              </button>
                           
                           @else 
                              <button wire:click="relatorios(
                                                      {{ $item->testes->id }}
                                                       )"
                                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                                    >
                                    Relatório
                              </button>

                           
                               
                           @endif

                        </td>
                        
                        
                     </tr>
                     @endforeach
                 
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- ====== Section: Testes referentes ao Pedido do Cliente- End -->



{{-- 
    <form wire:model="perguntaSel" class="max-w-sm mx-auto">
            <p >A pergunta selecionada é: {{ $perguntaSel }} </p>
            
            <div class="flex" wire:model.live="opcoesRespostasId" >
                @if ($perguntaSel)     
                    @foreach ($perguntaSel as $opcao)
                        @if($opcao->tipoOpcaoResposta == "P" && $opcao->inputType =="Radio")
                            <div class="flex items-center me-4">
                                <input id="{{ $opcao->id }}" type="radio" value="" name="{{ $opcao->id}}" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="{{ $opcao->id }}" 
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $opcao->id }}-{{ $opcao->textoResposta}}</label>
                            </div>
                        @endif
                    @endforeach
                @endif
                
            </div>
           
            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Technology</h3>
            


        

        

        </form>
 --}}

        
</div>
