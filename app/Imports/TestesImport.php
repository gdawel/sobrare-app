<?php

namespace App\Imports;

use App\Models\grupos_de_testesTestes;
use App\Models\Testes;
use App\Models\TestgroupTest;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TestesImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            /* Verifica se o teste existe na tabela. Se sim, atualiza. Do contrário, inclui um novo registro */
            $teste = Testes::where('codTeste', $row['cod_teste'])->first();
            if($teste) {

               $teste->update([
                 
                'nomeTeste' => $row['short_description'], 
                'slug' => $row['slug'], 
                'memoInterno' => $row['memo_interno'], 
                'textoIntro' => $row['introduction_text'], 
                'textoFecha' => $row['endind_text'], 
                'textoRodape' => $row['footer_text'], 
                'precoTeste' => $row['price'], 
                'isActive' => true

                ]); 

            } else {
                        
            Testes::create([
                
                'codTeste' => $row['cod_teste'], 
                'nomeTeste' => $row['short_description'], 
                'slug' => $row['slug'], 
                'memoInterno' => $row['memo_interno'], 
                'textoIntro' => $row['introduction_text'], 
                'textoFecha' => $row['endind_text'], 
                'textoRodape' => $row['footer_text'], 
                'precoTeste' => $row['price'], 
                'isActive' => true
            ]);

            $teste = Testes::where('codTeste', $row['cod_teste'])->first();
            grupos_de_testesTestes::create([

                'grupos_de_testes_id' => $row['group_id'],
                'testes_id' => $teste['id']
            ]);

            }
        }
    }
}
