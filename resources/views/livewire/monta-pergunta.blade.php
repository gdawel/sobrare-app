<div wire:key="montar">
    <h3>Testando o Componente</h3>
   
    
    

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


        
</div>
