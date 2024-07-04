<div wire:key="controles">
    <h1>Neurodiv - Tratar opcoesRespostas</h1>
    <table class="w-full table-auto">
        <thead >
            <tr class="text-center bg-primary">
                <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                            Coment
                </th>
                <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                            Complem
                </th>
                <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                            TpOpcResp
                </th>
                <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                            opcRespCheckbox
                </th>
                <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                            opcRespIntens
                </th>
                <th class=" text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                            resp. Primaria
                </th>
            </tr>
        </thead>
        <tbody >
            <tr>
                <td wire.model="comentarios" class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                    {{ $comentarios }}
                </td>
                <td wire.model="complementos" class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                    {{ $complementos }}
                </td>
                <td wire.model="tipoOpcaoResposta" class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                    {{ $tipoOpcaoResposta }}
                </td>
                <td wire.model="opcRespCheckbox" class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                    {{ $opcRespCheckbox }}
                </td>
                <td wire.model="opcRespIntensidade" class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                    {{ $opcRespIntensidade }}
                </td>
                <td wire.model="respostaprimaria" class="w-1/6  text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-1 px-2 text-center text-base font-medium">
                    {{ $respostaprimaria }}
                </td>
            </tr>
        
             
        </tbody>
</div>

