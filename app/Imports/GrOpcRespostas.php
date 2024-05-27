<?php

namespace App\Imports;

use App\Models\grupoOpcoesResposta;
use App\Models\GruposOpcRespostas;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GrOpcRespostas implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            /* Verifica se o grupo de opções de respostas existe. Se sim, atualiza. Do contrário, inclui um novo registro */
            $grupoopcressp = grupoOpcoesResposta::where('codGrupoOpcRespostas', $row['cod_grupo_opc_respostas'])->first();
            if($grupoopcressp) {

               $grupoopcressp->update([
                 
                'codTeste' => $row['cod_do_teste']
                
                ]); 

            } else {
                        
            grupoOpcoesResposta::create([
                'codGrupoOpcRespostas' => $row['cod_grupo_opc_respostas'],
                'codTeste' => $row['cod_do_teste']
                
            ]);
            }
        }
    }
}
