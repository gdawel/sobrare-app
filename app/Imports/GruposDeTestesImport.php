<?php

namespace App\Imports;

use App\Models\GruposDeTestes;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GruposDeTestesImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            /* Verifica se o grupo de teste existe. Se sim, atualiza. Do contrário, inclui um novo registro */
            $grupodeteste = GruposDeTestes::where('codGrupo', $row['cod_grupo'])->first();
            if($grupodeteste) {

               $grupodeteste->update([
                 
                'nomeGrupo' => $row['short_description'], 
                'slug' => $row['slug'], 
                'memoInterno' => $row['memo_interno'], 
                'descricaoExterna' => $row['long_description'], 
                'imagemGrupo' => '', 
                'precoGrupo' => $row['price'], 
                'isActive' => true
                ]); 

            } else {
                        
            GruposDeTestes::create([
                'codGrupo' => $row['cod_grupo'], 
                'nomeGrupo' => $row['short_description'], 
                'slug' => $row['slug'], 
                'memoInterno' => $row['memo_interno'], 
                'descricaoExterna' => $row['long_description'], 
                'imagemGrupo' => '', 
                'precoGrupo' => $row['price'], 
                'isActive' => true
            ]);
            }
        }
    }
}
