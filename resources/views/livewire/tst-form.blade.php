<div wire:key="grupos">
    <br>
    <div>
    <select wire:model.live="grupoTestesId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rouded-lg">
        <option>Selecione o Grupo de Testes</option>
        @foreach ($this->grupoTestes as $grupo)
            <option value="{{ $grupo->id }}"> {{ $grupo->nomeGrupo }} </option>
        @endforeach
    </select>
    <br><br>
    <select wire:model.live="testesId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rouded-lg">
        <option>Selecione o Teste</option>
        @foreach ($this->testes as $teste)
            <option value="{{ $teste->id }}"> {{ $teste->nomeTeste }} </option>
        @endforeach
    </select>
    <br><br>
    <select wire:model.live="questionId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rouded-lg">
        <option>Selecione a Pergunta</option>
        @foreach ($this->perguntas as $pergunta)
            <option value="{{ $pergunta->grupo_opcoes_respostas_id }}">{{ $pergunta->id }}-{{ $pergunta->enunciado }} </option>
        @endforeach
    </select>
    </div>
    <br><br>
    
    <form  type="submit"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rouded-lg">
                <div wire:model.live="opcoesRespostasId" class="flex items-center me-4 px-4 py-2">
                    @foreach ($this->opcoesRespostas as $opcresp)
                    
                        @if($opcresp->tipoOpcaoResposta == "P")
                            
                            <input type="{{ $opcresp->inputType }}" id="{{ $opcresp->id }}" name="resposta" value="{{ $opcresp->id}}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="{{ $opcresp->id }}"
                                    class="me-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $opcresp->id }}-{{ $opcresp->textoResposta}}</label>   
                        @endif
                    
                    @endforeach
                </div>
          {{-- <div wire:model="complementos"> --}}
                @if($this->complementos == "S")
                    <br>
                    <p class="mb-2 font-semibold text-gray-900 dark:text-white text-left px-4">Complemente sua resposta</p>
                    <ul class="w-90 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="w-full  border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        
                            @foreach ($this->opcoesRespostas as $opcresp)
                                @if($opcresp->tipoOpcaoResposta == "C" && $opcresp->inputType == "Checkbox")
                                <div class="flex items-center text-left ps-3">
                                    <input wire:model="opcRespCheckbox" type="{{ $opcresp->inputType }}" id="{{ $opcresp->id }}-{{ $opcresp->inputType }}" name="resposta" value="{{ $opcresp->id}}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="{{ $opcresp->id }}-{{ $opcresp->inputType }}"
                                        class="w-full py-1 ms-1 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $opcresp->id }}-{{ $opcresp->textoResposta}}</label>
                                </div>
                                @endif
                            @endforeach
                        
                        </li>
                    </ul>
                    @if ($opcresp->tipoOpcaoResposta == "C" )
                        <label for="countries_disabled" class="px-4 mt-1 text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione a Intensidade:</label>
                            <select wire:model="opcRespIntensidade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Intensidade</option>
                                    @foreach ($this->opcoesRespostas as $opcresp)
                                        @if ($opcresp->inputType == "Select")
                                        <option value="{{ $opcresp->valorResposta }}">{{ $opcresp->id }}-{{ $opcresp->textoResposta}}</option>
                                        @endif
                                @endforeach
                               
                            </select>
                    @endif


                @endif
            {{-- </div> --}}
            <div wire:model="comentarios">
                @if($this->comentarios == "S")
                    <label for="message" 
                        class="mt-1 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Caso deseje, comente sua resposta.</label>
                    <textarea wire:model="comentariosCliente" id="message" rows="2" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        placeholder="Escreva seu comentário aqui...">{{ $this->comentariosCliente }}</textarea>
                @endif
            </div>
    </form>
    
    
</div>
