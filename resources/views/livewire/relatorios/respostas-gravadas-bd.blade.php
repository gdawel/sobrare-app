<div wire:key="respostas">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <h4 class="text-2xl font-bold dark:text-white">{{ $this->tituloTeste  }}</h4>

    <h3>Order Id: {{ $dadosRelatorio['orders_id'] }}</h3>
    <h3>Teste Id: {{ $testes_id }} - {{ $dadosRelatorio['tituloTeste'] }}</h3>
    <h3>--------------------------------</h3>

    <table class="w-full table-auto">
        <thead >
        <tr class="text-center bg-primary">
            <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                >
                #Seq.
            </th>
            <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                >
                #Perg.
            </th>
            
            
            <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                >
                #OpcResp.
            </th>
            <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                >
                Checkbox
            </th>
            <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                >
                Intensid.
            </th>
            <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                >
                Notas do Cliente
            </th>
        </tr>
        </thead>
        <tbody >

            @foreach ($dadosRelatorio['resultadoTeste'] as $item)
                <tr wire:key="{{ $item->sequencia }}">
                        
                    <td
                        class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                        >
                        {{ $item->sequencia }}
                    </td>
                    <td
                        class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                        >
                        {{ $item->pergunta_id }}
                    </td>
                    <td
                        class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                        >
                        {{ $item->opcoes_respostas_id }}
                    </td>
                    <td
                        class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                        >
                        {{ $item->opcRespCheckbox }}
                    </td>
                    <td
                        class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                        >
                        {{ $item->opcRespIntensidade }}
                    </td>
                    <td
                        class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium"
                        >
                        {{ $item->comentariosCliente }}
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    

    {{-- <pre> < ? php print_r($this->useranswers); ?> </pre> --}}
</div>
