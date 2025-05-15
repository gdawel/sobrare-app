<?php

namespace App\Imports;

use App\Models\Grupos_de_testesTestes;
use App\Models\Testes;
use App\Models\TextoResposta;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TextoRespostaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            /* Verifica se o teste existe na tabela. Se sim, atualiza. Do contrário, inclui um novo registro */
            $textoResposta = TextoResposta::where('codTextoResposta', $row['cod_texto_resposta'])->first();
            if($textoResposta) {

               $textoResposta->update([
                 
                'codTextoResposta' => $row['cod_texto_resposta'], 
                'textoResposta' => $row['texto_avaliacao']

                ]); 

            } else {
                        
            TextoResposta::create([
                
                'codTextoResposta' => $row['cod_texto_resposta'], 
                'textoResposta' => $row['texto_avaliacao']
            ]);

            

            }
        }
    }
}
